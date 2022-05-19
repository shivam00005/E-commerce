<?php 
include('includes/db.php');
include('function/function.php'); 
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="common/style/header_footer.css">

    <style>
    .section {
        margin: 50px 50px;
    }

    .author {
        text-align: center;
    }

    footer div {

        position: fixed;
        padding: 10px 10px 0px 10px;
        bottom: 0;
        width: 100%;
        /* Height of the footer*/
        height: 40px;


    }


    footer div p {
        font-size: 1rem;
    }

    @media screen and (max-width: 700px) {
        .section {
            margin: 20px;

        }

        .author {
            width: 200px;
            height: 300px;
        }
    }

    @media screen and (max-width: 400px) {
        .section {
            margin: 10px;

        }

        .author {
            width: 100px;
            height: 150px;
        }
    }
    </style>
    <title>Online Shop</title>
</head>

<body>
    <?php include('common/header.php') ?>

    <section class="ftco-section-no-padding bg-light section">
        <div class="hero-wrap">
            <div class="d-flex">
                <div class="author-image text img p-md-5" style="background-image: url(author_image/author.jpg);">
                    <img class="author" src="author_image/author.jpg" alt="" width="300px" height="400px">
                </div>
                <div class="author-info text p-4 p-md-5 mt-5 mb-5">
                    <div class="desc">
                        <span class="subheading">Nice To Meet You</span>
                        <h1 class="mb-4"><span>My Name is Shivam Sharma </span></h1>
                        <h5 class="mb-4"> I am A Coder from Canada, i love work on new coding
                            projects and Currently I am studying interactive design and technology at Saskatchewan
                            Polytechnic. </h5>
                        <h2 class="mb-4 text-dark"><span>Thankyou for being here!! </span></h2>
                        <ul class="ftco-social mt-3">
                            <li class="ftco-animate"><a href="https://www.instagram.com/s_h_i_v_a_m_00005/"><span
                                        class="icon-instagram"></span></a></li>
                            <li class="ftco-animate"><a href="https://github.com/shivam00005"><span
                                        class="icon-github"></span></a></li>
                            <li class="ftco-animate"><a href="https://www.linkedin.com/in/s-sharma05/"><span
                                        class="icon-linkedin"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <?php include('common/footer.php') ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

</body>

</html>