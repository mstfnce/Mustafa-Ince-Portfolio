"use client";

import { useState } from "react";

// Ported from the contact form logic in script.js (validateContactForm +
// submit handler). Submits to the /api/contact route handler which emails the
// message via Resend. Client-side validation messages are kept identical.
function validateContactForm(formData: FormData): string {
  const name = String(formData.get("name") ?? "").trim();
  const email = String(formData.get("email") ?? "").trim();
  const subject = String(formData.get("subject") ?? "").trim();
  const message = String(formData.get("message") ?? "").trim();
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!name || !email || !subject || !message) {
    return "Please fill in all fields.";
  }
  if (name.length < 3) {
    return "Full name must be at least 3 characters.";
  }
  if (!emailPattern.test(email)) {
    return "Please enter a valid email address.";
  }
  if (subject.length < 3) {
    return "Subject must be at least 3 characters.";
  }
  if (message.length < 10) {
    return "Message must be at least 10 characters.";
  }
  return "";
}

export default function ContactForm() {
  const [status, setStatus] = useState<{ message: string; type: string }>({
    message: "",
    type: "",
  });
  const [submitting, setSubmitting] = useState(false);

  async function handleSubmit(e: React.FormEvent<HTMLFormElement>) {
    e.preventDefault();
    const form = e.currentTarget;
    const formData = new FormData(form);

    const validationError = validateContactForm(formData);
    if (validationError) {
      setStatus({ message: validationError, type: "error" });
      return;
    }

    setStatus({ message: "Sending...", type: "" });
    setSubmitting(true);

    try {
      const response = await fetch("/api/contact", {
        method: "POST",
        body: formData,
      });
      const result = await response.json();

      setStatus({
        message: result.message || "Request completed.",
        type: result.success ? "success" : "error",
      });

      if (result.success) {
        form.reset();
      }
    } catch {
      setStatus({
        message: "Connection error. Please try again.",
        type: "error",
      });
    } finally {
      setSubmitting(false);
    }
  }

  return (
    <form className="contact-form" id="contactForm" onSubmit={handleSubmit}>
      <input
        className="form-input"
        type="text"
        name="name"
        placeholder="Full Name"
        required
      />
      <input
        className="form-input"
        type="email"
        name="email"
        placeholder="Email"
        required
      />
      <input
        className="form-input"
        type="text"
        name="subject"
        placeholder="Subject"
        required
      />
      <textarea
        className="form-input form-textarea"
        name="message"
        placeholder="Message"
        required
      ></textarea>
      <button className="form-submit" type="submit" disabled={submitting}>
        <span>Send</span>
        <span className="btn-arrow">↗</span>
      </button>
      <p
        className={status.type ? `form-status ${status.type}` : "form-status"}
        id="contactStatus"
        aria-live="polite"
      >
        {status.message}
      </p>
    </form>
  );
}
