import { Resend } from "resend";

// Ported from contact.php. Instead of inserting into a `messages` table, the
// submission is emailed via Resend. Server-side validation mirrors the original
// (all fields required + valid email). Returns the same JSON shape the client
// (ContactForm) expects: { success, message }.

const EMAIL_PATTERN = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

export async function POST(request: Request) {
  const formData = await request.formData();

  const name = String(formData.get("name") ?? "").trim();
  const email = String(formData.get("email") ?? "").trim();
  const subject = String(formData.get("subject") ?? "").trim();
  const message = String(formData.get("message") ?? "").trim();

  if (!name || !email || !subject || !message) {
    return Response.json(
      { success: false, message: "Please fill in all fields." },
      { status: 422 },
    );
  }

  if (!EMAIL_PATTERN.test(email)) {
    return Response.json(
      { success: false, message: "Please enter a valid email address." },
      { status: 422 },
    );
  }

  const apiKey = process.env.RESEND_API_KEY;
  if (!apiKey) {
    console.error("RESEND_API_KEY is not configured.");
    return Response.json(
      {
        success: false,
        message: "Email service is not configured. Please try again later.",
      },
      { status: 500 },
    );
  }

  const toEmail = process.env.CONTACT_TO_EMAIL ?? "mustafancee.52@gmail.com";
  const resend = new Resend(apiKey);

  try {
    const { error } = await resend.emails.send({
      // Resend's shared sender works without domain verification for messages
      // sent to your own verified account email. Swap for a verified domain
      // sender once one is set up.
      from: "Portfolio Contact <onboarding@resend.dev>",
      to: [toEmail],
      replyTo: email,
      subject: `[Portfolio] ${subject}`,
      text: `Name: ${name}\nEmail: ${email}\nSubject: ${subject}\n\n${message}`,
    });

    if (error) {
      console.error("Resend error:", error);
      return Response.json(
        { success: false, message: "Your message could not be sent." },
        { status: 502 },
      );
    }

    return Response.json({
      success: true,
      message: "Your message has been sent successfully.",
    });
  } catch (err) {
    console.error("Contact route error:", err);
    return Response.json(
      { success: false, message: "Your message could not be sent." },
      { status: 500 },
    );
  }
}
