<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
</head>

<body style="margin:0; padding:0; background:#f3f4f6; font-family:Inter,Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0" 
                    style="background:#ffffff; border-radius:12px; overflow:hidden;">

                    <!-- Header -->
                    <tr>
                        <td style="background:#111827; padding:32px; text-align:center;">
                            <h2 style="color:white; margin:0; font-size:24px; font-weight:600;">
                                ✉️ New Contact Message
                            </h2>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding:40px; color:#111827;">

                            <p style="font-size:16px; margin-bottom:20px;">
                                You received a new message from your website.
                            </p>

                            <div style="margin-bottom:24px;">

                                <div style="border-bottom:1px solid #e5e7eb; padding:12px 0;">
                                    <strong style="color:#374151;">Name:</strong> {{ $name }}
                                </div>

                                <div style="border-bottom:1px solid #e5e7eb; padding:12px 0;">
                                    <strong style="color:#374151;">Email:</strong> {{ $email }}
                                </div>

                                <div style="padding:12px 0;">
                                    <strong style="color:#374151;">Message:</strong>
                                    <div style="
                                        margin-top:10px;
                                        background:#f9fafb;
                                        padding:16px;
                                        border-radius:8px;
                                        border:1px solid #e5e7eb;
                                        font-size:15px;
                                        color:#374151;
                                        line-height:1.6;
                                    ">
                                        {{ $user_msg }}
                                    </div>
                                </div>

                            </div>

                            <p style="font-size:14px; color:#6b7280;">
                                This email was sent from your contact form.
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#111827; padding:20px; text-align:center;">
                            <p style="color:#9ca3af; font-size:13px; margin:0;">
                                © {{ date('Y') }} Portfolio Website — All Rights Reserved
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
