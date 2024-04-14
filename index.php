<?php
include_once 'header.php';
?>

<body>
    <div id="main-page" class="page"> <!-- Landing Page -->
        <container class="container">
            <div class="content row">
                <div class="col text">
                    <h1 class="fw-bold">Design</h1>
                    <h2 class="fw-light">Innovations</h2>
                    <img class="dots" src="images/black_dots.png">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pharetra ac tortor sit amet semper. Vestibulum feugiat molestie nibh, ac interdum lectus condimentum nec. Duis vulputate mi ligula, at imperdiet arcu dignissim eu. Maecenas tincidunt purus ac enim dictum faucibus. Nulla neque arcu, eleifend ac dolor vitae, consectetur tempor arcu.</p>
                </div>
                <div class="col position-relative">
                    <img id="img-vr" src="images/01.jpeg">
                    <b class="date position-absolute top-100 translate-middle">JUNE 2024</b>
                </div>
                <div class="col text">
                    <h1 class="fw-bold">Creative</h1>
                    <h2 class="fw-light">Solutions</h2>
                    <img class="dots" src="images/black_dots.png">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pharetra ac tortor sit amet semper. Vestibulum feugiat molestie nibh, ac interdum lectus condimentum nec. Duis vulputate mi ligula, at imperdiet arcu dignissim eu. Maecenas tincidunt purus ac enim dictum faucibus. Nulla neque arcu, eleifend ac dolor vitae, consectetur tempor arcu.</p>
                </div>
            </div>
        </container>
    </div>

    <div id = "page-1" class="page"> <!-- Weekly Insights-->
        <header><b>Weekly </b>Insights</header>
        <div class="content row">
            <div class="d-flex text col">
                <img class="dots" src="images/white_dots.png">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pharetra ac tortor sit amet semper. Vestibulum feugiat molestie nibh, ac interdum lectus condimentum nec. Duis vulputate mi ligula, at imperdiet arcu dignissim eu. Maecenas tincidunt purus ac enim dictum faucibus. Nulla neque arcu, eleifend ac dolor vitae, consectetur tempor arcu.</p>
            </div>
            <div class="tab col">
                <div class="d-flex float-end">
                    <i class="material-icons md-18">cruelty_free</i>
                    <p><b>THE MAD HATTER*</b></p>
                </div>
                <img src="images/01.jpeg">
            </div>
        </div>
    </div>

    <div id="page-2" class="page"> <!-- Collaborations -->
        <header><b>Collaborations</b></header>
        <div class="content">

            <?php
            $project_count = 0;

            $stmt = "SELECT * FROM projects";

            $result = $mysqli->query($stmt);

            echo $mysqli->error;

            $projects = $result->fetch_all(MYSQLI_ASSOC);

            foreach ($projects as $project)
            {
                $project_count++;

                echo '<div class="row">';

                if (0 === $project_count % 2) {
                    echo '<div class="col"> <img class="product" src="images/' . $project['imgref'] . '"> </div>';
                }

                echo '<div class="col"> <div class="d-flex subtitle"> <h1>' . sprintf("%02d", $project_count) . '</h1> <h2>' . $project['title'] . '</h2> </div> <div class="text"> <img class="dots" src="images/black_dots.png"> <p>' . $project['description'] . '</p> </div> </div>';

                if (0 != $project_count % 2) {
                    echo '<div class="col"> <img class="product" src="images/' . $project['imgref'] . '"> </div>';
                }

                echo '</div>';
            }
            ?>
        </div>
    </div>

    <div id="page-3" class="page">
        <div class="designers">
            <header><b>Our </b>Designers</header>
            <img class="dots" src="images/white_dots.png">
            <p>First Surname - First Surname - First Surname - First Surname - First Surname - First Surname - First Surname - First Surname - First Surname - First Surname - First Surname - First Surname - First Surname - First Surname - First Surname</p>
        </div>
    </div>
</body>

<?php
include_once 'footer.php';
?>