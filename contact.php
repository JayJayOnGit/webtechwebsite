<?php
include_once 'header.php';
?>

<body>
    <div id="contact-us" autocomplete="off">
        <h1><b>Contact</b> Us</h1>
        <div class="d-flex">
            <p class="sign-up" onclick="sign_in()">Click here if you are an existing user.</p>
            <p class="sign-in" onclick="sign_up()">Click here if you are a new user.</p>
        </div>
        <form>
            <div class="sign-up">
                <label for="name">Name:</label><br>
                <input type="text" id="form-name" name="name" placeholder="username" pattern="^[A-Za-z ]+$" required><br>
            </div>
            <label for="email">Email:</label><br>
            <input type="text" id="form-email" name="email" placeholder="user@email.com" pattern="^\w+[@]\w+[.].+$" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="form-password" name="password" required><br>
            <div class="sign-up">
                <label for="password_confirm">Confirm Password:</label><br>
                <input type="password" id="form-password-confirm" name="password_confirm" required><br>
            </div>
            <div class="sign-up password-req">
                <p>Password Requires:</p>
                <p>At least one Uppercase Letter</p>
                <p>At least one Lowercase Letter</p>
                <p>At least one Special Character</p>
                <p>At least one Numerical Character</p>
                <p>A minimum length of 8</p>
            </div>
            <label for="message">Message:</label><br>
            <input type="text" id="form-message" name="message" required><br>
            <button id="send" class="sign_up_send">Send</button>
        </form>

        <p id="submit-message"></p>
    </div>

    <script>
        function sign_up() {
            const sigh_up_elems = document.getElementsByClassName("sign-up");
            const sigh_in_elems = document.getElementsByClassName("sign-in");
            const send_input = document.getElementById("send");

            for (let i = 0; i < sigh_up_elems.length; i++)
            {
                sigh_up_elems[i].style.display = "block";
            }

            for (let i = 0; i < sigh_in_elems.length; i++)
            {
                sigh_in_elems[i].style.display = "none";
            }

            send_input.classList.add("sign_up_send");
            send_input.classList.remove("sign_in_send");

        }

        function sign_in() {
            const sigh_up_elems = document.getElementsByClassName("sign-up");
            const sigh_in_elems = document.getElementsByClassName("sign-in");
            const send_input = document.getElementById("send");

            for (let i = 0; i < sigh_up_elems.length; i++)
            {
                sigh_up_elems[i].style.display = "none";
            }

            for (let i = 0; i < sigh_in_elems.length; i++)
            {
                sigh_in_elems[i].style.display = "block";
            }

            send_input.classList.add("sign_in_send");
            send_input.classList.remove("sign_up_send");
        }
    </script>
</body>

<?php
include_once 'footer.php';
?>