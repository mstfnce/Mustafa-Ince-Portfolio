<?php
$lines = [
    ['Mustafa Ince', 48, 50, 790],
    ['Software Engineer', 18, 390, 792],
    ['Phone: +90 541 569 1198', 12, 50, 750],
    ['E-mail: mustafancee.52@gmail.com', 12, 230, 750],
    ['Istanbul/Turkey', 12, 450, 750],
    ['LinkedIn: www.linkedin.com/in/mustafa-ince-3b3b2a300', 12, 50, 732],
    ['GitHub: https://github.com/mstfnce', 12, 50, 714],
    ['Profile:', 14, 50, 680],
    ['Software Engineering student at Halic University with a strong foundation in algorithms,', 11, 50, 662],
    ['data structures, and object-oriented programming. Passionate about mobile app development', 11, 50, 648],
    ['and continuously improving backend skills.', 11, 50, 634],
    ['Skills:', 14, 50, 600],
    ['- Programming Languages: Python, C++, Java, Javascript, C#', 11, 70, 582],
    ['- Object-Oriented Programming (OOP) principles', 11, 70, 568],
    ['- Algorithms and Data Structures', 11, 70, 554],
    ['- SQL - Database queries', 11, 70, 540],
    ['- Mobile App Development - Java (Android)', 11, 70, 526],
    ['- HTML, CSS, Bootstrap', 11, 70, 512],
    ['- React', 11, 70, 498],
    ['- Asp .Net Core', 11, 70, 484],
    ['Education:', 14, 50, 450],
    ['- Halic University - Bachelor of Science in Software Engineering', 11, 70, 432],
    ['  09/2022 - Present, 3rd grade, Istanbul, Turkey', 11, 70, 418],
    ['- Unye Science High School - Science Track', 11, 70, 392],
    ['  Graduation Year: 2022, Unye, Turkey', 11, 70, 378],
    ['Projects:', 14, 50, 344],
    ['Task Tracker App (Java - Android)', 13, 70, 326],
    ['A mobile application that allows users to create goals and track daily progress.', 10, 70, 308],
    ['Features include task CRUD, filtering, percentage progress tracking, XML UI,', 10, 70, 295],
    ['SharedPreferences, RecyclerView, ProgressBar, and DonutChart components.', 10, 70, 282],
    ['GitHub: https://github.com/mstfnce/Task-Tracker-App', 10, 70, 264],
    ['CashFlow App (Java - Android)', 13, 70, 232],
    ['A simple financial management tool to monitor income and expenses.', 10, 70, 214],
    ['Users can define categories, add entries, and view daily/weekly/monthly summaries.', 10, 70, 201],
    ['Built with Material Design and stores data locally with SharedPreferences.', 10, 70, 188],
    ['GitHub: https://github.com/mstfnce/CashFlow-App', 10, 70, 170],
];

function pdfText(string $text): string
{
    return str_replace(['\\', '(', ')'], ['\\\\', '\\(', '\\)'], $text);
}

$stream = "0.2 w 50 778 m 545 778 l S\n";

foreach ($lines as [$text, $size, $x, $y]) {
    $stream .= "BT /F1 {$size} Tf {$x} {$y} Td (" . pdfText($text) . ") Tj ET\n";
}

$objects = [
    "1 0 obj\n<< /Type /Catalog /Pages 2 0 R >>\nendobj\n",
    "2 0 obj\n<< /Type /Pages /Kids [3 0 R] /Count 1 >>\nendobj\n",
    "3 0 obj\n<< /Type /Page /Parent 2 0 R /MediaBox [0 0 595 842] /Resources << /Font << /F1 4 0 R >> >> /Contents 5 0 R >>\nendobj\n",
    "4 0 obj\n<< /Type /Font /Subtype /Type1 /BaseFont /Times-Roman >>\nendobj\n",
    "5 0 obj\n<< /Length " . strlen($stream) . " >>\nstream\n{$stream}endstream\nendobj\n",
];

$pdf = "%PDF-1.4\n";
$offsets = [0];

foreach ($objects as $object) {
    $offsets[] = strlen($pdf);
    $pdf .= $object;
}

$xrefOffset = strlen($pdf);
$pdf .= "xref\n0 " . (count($objects) + 1) . "\n";
$pdf .= "0000000000 65535 f \n";

for ($i = 1; $i <= count($objects); $i++) {
    $pdf .= sprintf("%010d 00000 n \n", $offsets[$i]);
}

$pdf .= "trailer\n<< /Size " . (count($objects) + 1) . " /Root 1 0 R >>\n";
$pdf .= "startxref\n{$xrefOffset}\n%%EOF";

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="mustafa-ince-cv.pdf"');
header('Content-Length: ' . strlen($pdf));
echo $pdf;
