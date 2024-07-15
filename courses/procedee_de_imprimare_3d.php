<?php 
    include '../databases/databases.php';
    $courseId = 242;

    $sql = "SELECT * FROM courses WHERE id = '$courseId'";
    $course = mysqli_query($conn['main'], $sql);
    $course = mysqli_fetch_assoc($course);

    $sql = "SELECT * FROM course_sections WHERE courseId = '$courseId' ORDER BY sectionOrder";
    $sections = mysqli_query($conn['main'], $sql);
    $sections = mysqli_fetch_all($sections, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://cdn.tailwindcss.com"></script>
		<script src="../javascript/tailwindAddOns.js"></script>
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="../css/customClases.css">
		<title>Printbuddy</title>
	</head>

	<body class = "flex flex-col gap-5 sm:gap-6 pb-24">
        <img src="../generalIcons/returnIcon.png" alt="" class = "h-7 w-7 mt-6 ml-3 sm:ml-6 md:mt-10 md:ml-12" onclick = "returnToLastPage()">
		<div class = "flex flex-col justify-center items-center gap-8 sm:gap-10 md:gap-12">
			<h1 class = "font-bold text-2.5xl md:text-4xl text-primaryColor"><?php echo $course['title'] ?></h1>
            <p class = "text-sm sm:text-base md:text-lg md:text-lg text-center w-82 sm:w-105 md:w-150"><?php echo $course['description']?></p>
            <?php foreach($sections as $section): ?>
                <?php 
                    $sectionId = $section['id'];
                    $sql = "SELECT * FROM section_content WHERE sectionId = '$sectionId'";
                    $sectionData = mysqli_query($conn['main'], $sql);
                    $sectionData = mysqli_fetch_all($sectionData, MYSQLI_ASSOC);
                ?>

                <?php switch($section['sectionType']):
                    case "subtitle": ?>
                        <p class = "text-1.5xl md:text-2.5xl font-bold text-primaryColor text-center px-4"><?php echo $sectionData['0']['content']?></p>
                    <?php break ?>
                    <?php case "text": ?>
                        <p class = "text-sm sm:text-base md:text-lg w-82 sm:w-105 md:w-150"><?php echo nl2br($sectionData['0']['content'])?></p>
                    <?php break ?>
                    <?php case "image": ?>
                        <img src="<?php echo 'uploads/'.$sectionData[0]['content']?>" alt="" class = "w-82 sm:w-105 h-50 sm:h-60 md:w-150 md:h-84">
                    <?php break ?>
                    <?php case "textImage": ?>
                        <p class = "text-sm sm:text-base md:text-lg w-82 sm:w-105 md:w-150"><?php echo nl2br($sectionData[0]['content'])?></p>
                        <img src="<?php echo 'uploads/'.$sectionData[1]['content']?>" alt="" class = "w-82 sm:w-105 h-50 sm:h-60 md:w-150 md:h-84">
                    <?php break ?>
                    <?php case "tripleImageDescription": ?>
                        <?php for($i=0; $i<=5; $i++): ?>
                            <?php if($i%2 == 1): ?>
                                <img src="<?php echo 'uploads/'.$sectionData[$i]['content']?>" alt="" class = "w-82 sm:w-105 h-50 sm:h-60 md:w-150 md:h-84">
                            <?php else: ?>
                                <p class = "text-sm sm:text-base md:text-lg w-82 sm:w-105 md:w-150"><?php echo nl2br($sectionData[$i]['content'])?></p>
                            <?php endif ?>
                        <?php endfor ?>
                    <?php break ?>
                    <?php case "tripleImage": ?>
                        <?php for($i=0; $i<=2; $i++): ?>
                            <img src="<?php echo 'uploads/'.$sectionData[$i]['content']?>" alt="" class = "w-82 sm:w-105 h-50 sm:h-60 md:w-150 md:h-84">
                        <?php endfor ?>
                    <?php break ?>
                    <?php case "video": ?>
                        <iframe class = "w-82 sm:w-105 h-50 sm:h-60 md:w-150 md:h-84" src="<?php echo $sectionData[0]['content']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <?php break ?>
                <?php endswitch ?>
            <?php endforeach ?>
		</div>
    </body>
</html>

<script src = "../javascript/return.js"></script>