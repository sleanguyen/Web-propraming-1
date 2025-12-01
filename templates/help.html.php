<div style="max-width: 600px; margin: 30px auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    
    <h2 style="color: #e67e22; text-align: center;">Help & Support</h2>
    <p style="text-align: center; color: #666;">Need to change your password or report an issue? Send a request to the Master Admin.</p>
    <p style="text-align: center; color: #666;">Write the password or email you want to change</p>


    <?= $message ?>

    <form action="" method="post" style="margin-top: 20px;">
        
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold; display: block;">Subject:</label>
            <select name="subject" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <option value="Change Password Request">🔑 Request Password Change</option>
                <option value="Change Email Request">📧 Request Email Change</option>
                <option value="Report a Bug">Report a Bug</option>
                <option value="Other">Other Inquiry</option>
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="font-weight: bold; display: block;">Message:</label>
            <textarea name="message" rows="5" required placeholder="Describe your request..." 
                      style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
        </div>

        <input type="submit" name="send_help" value="Send Request"
               style="width: 100%; background-color: #e67e22; color: white; border: none; padding: 12px; font-weight: bold; border-radius: 5px; cursor: pointer;">
    </form>
</div>