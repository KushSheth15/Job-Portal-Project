<?php
session_start();
error_reporting(0);
include('includes/connection.php');
?>

<head>
<link href="css/header.css" rel='stylesheet' type='text/css' />
<link href="css/review.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style_u.css" rel='stylesheet' type='text/css' />
	<!-- <link href="css/style.css" rel='stylesheet' type='text/css' /> -->

	<link rel="stylesheet" href="css/morris.css" type="text/css" />
<!-- Bootstrap CSS Link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!-- Font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Bootstrap JS Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<script src="https://kit.fontawesome.com/6b9e4c72bd.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

	<?php include('includes/header.php'); ?>


<div class="container">
    <div class="mgb-40 padb-30 auto-invert line-b-4 align-center">
    <h4 class="font-cond-l fg-accent lts-md mgb-10" contenteditable="false">Not Yet Convinced?</h4>
    <h1 class="font-cond-b fg-text-d lts-md fs-300 fs-300-xs no-mg" contenteditable="false">Read Customer Reviews</h1>
</div>
<ul class="hash-list cols-3 cols-1-xs pad-30-all align-center text-sm">
        <li>
          <img src="martha.jpeg" class="wpx-100 img-round mgb-20" title="" alt="" data-edit="false" data-editor="field" data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
          <p class="fs-110 font-cond-l" contenteditable="false">" Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae. "</p>
          <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Martha Stewart</h5>
          <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">Business Woman - New York</small>
        </li>
        <li>
          <img src="ariana.png" class="wpx-100 img-round mgb-20" title="" alt="" data-edit="false" data-editor="field" data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
          <p class="fs-110 font-cond-l" contenteditable="false">" Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae. "</p>
          <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Ariana Menage</h5>
          <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">Recording Artist - Los Angeles</small>
        </li>
        <li>
          <img src="oberoi.jpeg" class="wpx-100 img-round mgb-20" title="" alt="" data-edit="false" data-editor="field" data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
          <p class="fs-110 font-cond-l" contenteditable="false">" Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae. "</p>
          <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Vikram Oberoi</h5>
          <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">Oberoi Group</small>
        </li>
       
      </ul>
</div>
<!--- /footer-top ---->
<?php include('includes/footer.php'); ?>

<!-- write us -->
<?php include('includes/write-us.php'); ?>
</body>