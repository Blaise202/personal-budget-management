<!DOCTYPE html>

<html lang="en">

 <head>
  <meta charset="UTF-8">
 </head>

 <body style="margin:0; padding:0; background-color:#f4f6f8; font-family: Arial, Helvetica, sans-serif;">

  <table cellpadding="0" cellspacing="0" style="background-color:#f4f6f8; padding:30px 0;" width="100%">
   <tr>
    <td align="center">

     <!-- Container -->
     <table cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:10px; overflow:hidden; box-shadow:0 8px 25px rgba(0,0,0,0.08);" width="600">

      <!-- Header -->
      <tr>
       <td style="background:linear-gradient(135deg, #4f46e5, #6366f1); padding:25px; text-align:center;">
        <h1 style="margin:0; color:#ffffff; font-size:22px;">
         Thank You for Reaching Out
        </h1>
       </td>
      </tr>

      <!-- Body -->
      <tr>
       <td style="padding:30px; color:#374151; font-size:15px; line-height:1.6;">
        <p style="margin:0 0 15px;">
         Hello <strong>{{ $email->name }}</strong>,
        </p>

        <p style="margin:0 0 15px;">
         Thank you for contacting us through the portfolio website.
         Your message has been received successfully, and we truly appreciate
         you taking the time to reach out.
        </p>

        <p style="margin:0 0 15px;">
         We’ll review your message and get back to you as soon as possible.
         If your inquiry is urgent, feel free to reply directly to this email.
        </p>

        <p style="margin:0 0 20px;">
         Looking forward to connecting with you!
        </p>

        <p style="margin:0;">
         Best regards,<br>
         <strong>Blaise</strong><br>
         <span style="color:#6b7280;">Blaise Izerimana</span>
        </p>
       </td>
      </tr>

      <!-- Footer -->
      <tr>
       <td style="background-color:#f9fafb; padding:20px; text-align:center; font-size:13px; color:#9ca3af;">
        This is an automated confirmation email.<br>
        © {{ Carbon\Carbon::now()->year }} Blaise Izerimana. All rights reserved.
       </td>
      </tr>

     </table>

    </td>
   </tr>
   ```

  </table>

 </body>

</html>
