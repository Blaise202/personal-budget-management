<!DOCTYPE html>
<html lang="en">

 <head>
  <meta charset="UTF-8">
  <title>New Message from Your Portfolio</title>
 </head>

 <body style="margin:0; padding:0; background-color:#f4f6f8; font-family: Arial, Helvetica, sans-serif;">

  <table cellpadding="0" cellspacing="0" style="background-color:#f4f6f8; padding:30px 0;" width="100%">
   <tr>
    <td align="center">

     <!-- Main container -->
     <table cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:10px; overflow:hidden; box-shadow:0 8px 25px rgba(0,0,0,0.08);" width="600">

      <!-- Header -->
      <tr>
       <td style="background:linear-gradient(135deg, #4f46e5, #6366f1); padding:25px; text-align:center;">
        <h1 style="margin:0; color:#ffffff; font-size:22px; letter-spacing:0.5px;">
         New Portfolio Message
        </h1>
       </td>
      </tr>

      <!-- Content -->
      <tr>
       <td style="padding:30px; color:#374151;">
        <p style="margin:0 0 15px; font-size:15px;">
         Hello <strong>Blaise</strong>,
        </p>

        <p style="margin:0 0 20px; font-size:15px; line-height:1.6;">
         You’ve received a new message from your portfolio website. Here are the details:
        </p>

        <!-- Message Card -->
        <table cellpadding="0" cellspacing="0" style="background-color:#f9fafb; border-radius:8px; padding:20px;" width="100%">
         <tr>
          <td style="padding-bottom:10px;">
           <strong style="color:#111827;">Sender Name:</strong><br>
           <span style="color:#4b5563;">{{ $email->name }}</span>
          </td>
         </tr>

         <tr>
          <td style="padding-bottom:10px;">
           <strong style="color:#111827;">Sender Email:</strong><br>
           <a href="mailto:{{ $email->email }}" style="color:#4f46e5; text-decoration:none;">
            {{ $email->email }}
           </a>
          </td>
         </tr>

         <tr>
          <td>
           <strong style="color:#111827;">Message:</strong><br>
           <p style="margin:8px 0 0; color:#4b5563; line-height:1.6;">
            {{ $email->message }}
           </p>
          </td>
         </tr>
        </table>

        <!-- CTA -->
        <p style="margin:25px 0 0; font-size:14px; color:#6b7280;">
         You can reply directly to this email to respond faster.
        </p>
       </td>
      </tr>

      <!-- Footer -->
      <tr>
       <td style="background-color:#f9fafb; padding:20px; text-align:center; font-size:13px; color:#9ca3af;">
        © {{ Carbon\Carbon::now()->year }} Blaise Izerimana<br>
        Built with passion and purpose 🚀
       </td>
      </tr>

     </table>

    </td>
   </tr>
  </table>

 </body>

</html>
