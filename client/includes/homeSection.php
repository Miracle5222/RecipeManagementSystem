<!-- <div class="container">

    <section>
        <h1>Featured Recipes</h1>
        <div class="box">
            <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner ">
                    <div class="carousel-item active">
                        <div class="box1">
                            <img class="d-block w-100 images" src="./assets/images/f1.jpg" alt="First slide">
                        </div>

                    </div>
                    <div class="carousel-item">
                        <div class="box1">
                            <img class="d-block w-100 images" src="./assets/images/f2.jpg" alt="Second slide">
                        </div>

                    </div>
                    <div class="carousel-item">
                        <div class="box1">
                            <img class="d-block w-100 images" src="./assets/images/f3.jpg" alt="Third slide">
                        </div>

                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
</div> -->

<div class="container">

    <section>
        <h1>Featured Recipes</h1>
        <div class="box">

            <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    if (isset($_SESSION['total'])) {
                        $i = 0;
                        for ($i; $i < $_SESSION['total']; $i++) {


                    ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="active"></li>
                    <?php

                        }
                    }


                    ?>
                    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>"></li> -->
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

                </ol>






                <div class="carousel-inner ">

                    <div class="carousel-item active">
                        <div class="box1">
                            <img class="d-block w-100 images" src="./assets/images/f1.jpg" alt="First slide">
                        </div>

                    </div>
                    <div class="carousel-item">
                        <div class="box1">
                            <img class="d-block w-100 images" src="./assets/images/f2.jpg" alt="Second slide">
                        </div>

                    </div>
                    <div class="carousel-item">
                        <div class="box1">
                            <img class="d-block w-100 images" src="./assets/images/f3.jpg" alt="Third slide">
                        </div>

                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
</div>