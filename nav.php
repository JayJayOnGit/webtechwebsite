<div id="nav-bar" class="position-absolute start-0 top-0">
    <i class="material-icons md-18">cruelty_free</i>
    <a>THE MAD HATTER*</a>
    <a href="index.php">Home</a>
    <a>About</a>
    <a>Solutions</a>
    <a href="contact.php">Contact Us</a>
</div>
<div id="hamburger">
    <i id="hamburger-toggle" class="material-icons md-18">menu</i>
    <div id="dropdown">
        <a href="index.php">Home</a>
        <a>About</a>
        <a>Solutions</a>
        <a href="contact.php">Contact Us</a>
    </div>
</div>

<script>
    $(document).ready(function(){
        console.log("we up");
        $("#hamburger-toggle").click(function(){
            console.log("we doin it");
            $("#dropdown").slideToggle();
            console.log("we doned it");
        });
    });
</script>