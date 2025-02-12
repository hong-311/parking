<?php
include './db.php'; 
error_reporting(E_ALL);
ini_set("display_errors", 1);

$categorycode = $_GET['categorycode']; 
$sql = "SELECT DISTINCT title FROM content WHERE categorycode = ?"; 
$params = [$categorycode];
$result = query($sql, $params)->fetch();
$category = $result['title'];

// 변수 초기화
$title = "";

if (!empty($result)) {
    $title = $result['title'];
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <?php include "./front_header.php"; ?>
    <link rel="stylesheet" href="./css/sub.css">
    <title><?php echo $title; ?></title>
    <script type="text/javascript">
        // == 마스킹코드 ==
        window.addEventListener('load', function() {
            document.getElementById('loading-mask').remove();
        });
    </script>
</head>
<body>
    <div id="loading-mask" style="position: fixed; z-index: 999; left: 0; right: 0; top: 0; bottom: 0;"></div>
    <div id="wrap">
        <?php include "./header.php"; ?>
        <div class="section_<?php echo $categorycode; ?>">
            <?php
           if ($categorycode == 'E' || $categorycode == 'E2') {
            echo '<div class="flex">';
            echo '<div class="btn_group">';
            echo '<a href="./sub5.php?categorycode=E">지역별 온라인 신청 문의</a>';
            echo '<a href="./sub5.php?categorycode=E1">교통유발 부담금?</a>';
            echo '<a href="./sub5.php?categorycode=E2">주정차 단속 피하는 TIP</a>';
            echo '<a href="./sub5.php?categorycode=E3-1">주정차사고 당했을 시</a>';
            echo '<a href="./sub5.php?categorycode=E4-1">FAQ</a>';
            echo '</div>';
        
            $sql2 = "SELECT * FROM content WHERE categorycode = ?";
            $result2 = query($sql2, [$categorycode])->fetchAll();
        
            if (!empty($result2)) {
                echo '<div class="content1">';
                echo '<h2 class="sub_title">' . htmlspecialchars($result2[0]['sub_title']) . '</h2>';
                if ($categorycode == 'E2') {
                    echo '<img src="./img/sub-img.png"  class="custom_image">';
                }
        
                echo '<div class="box">';
                foreach ($result2 as $val) {
                    if (!empty($val['box_title'])) {
                        echo '<pre class="box_title">' . htmlspecialchars($val['box_title']) . '</pre>';
                    }
                    
                    // box_con이 있을 경우 출력
                    if (!empty($val['box_con'])) {
                        echo '<pre class="box_con">' . htmlspecialchars($val['box_con']) . '</pre>';
                    }
                    echo '<pre class="bold">' . htmlspecialchars($val['bold']) . '</pre>';
                    echo '<pre class="con">' . htmlspecialchars($val['content']) . '</pre>';
                }
                echo '</div>'; // box
                echo '<div class="top_button_wrap">';
                echo '<a href="#" class="top_button"><img src="./img/arrow-4.png"></a>';
                echo '</div>';
                echo '</div>'; // content1
            }
        
            echo '</div>'; // flex
        
            // 네비게이션 버튼 처리
            if ($categorycode == 'E') {
                echo '<div class="btn_wrap1">';
                echo '<a class="next" href="./sub5.php?categorycode=E1">';
                echo '<div class="btn_left">';
                echo '<span class="s1">다음글</span>';
                echo '<span class="s2">교통유발 부담금?</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }elseif ($categorycode == 'E2') {
                echo '<div class="btn_wrap2">';
                echo '<a class="back5" href="./sub5.php?categorycode=E1">';
                echo '<div class="btn_left">';
                echo '<span class="s1">이전글</span>';
                echo '<span class="s2">교통유발 부담금?</span>';
                echo '</div>';
                echo '</a>';
                echo '<a class="next" href="./sub5.php?categorycode=E3-1">';
                echo '<div class="btn_left">';
                echo '<span class="s1">다음글</span>';
                echo '<span class="s2">당했다면?</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }
        }  elseif ($categorycode == 'E1') {
            echo '<div class="flex">';
            echo '<div class="btn_group">';
            echo '<a href="./sub5.php?categorycode=E">지역별 온라인 신청 문의</a>';
            echo '<a href="./sub5.php?categorycode=E1">교통유발 부담금?</a>';
            echo '<a href="./sub5.php?categorycode=E2">주정차 단속 피하는 TIP</a>';
            echo '<a href="./sub5.php?categorycode=E3-1">주정차사고 당했을 시</a>';
            echo '<a href="./sub5.php?categorycode=E4-1">FAQ</a>';
            echo '</div>';
        
            $sql2 = "SELECT sub_title, box_con, box_title, content FROM content WHERE categorycode = ?";
            $result2 = query($sql2, [$categorycode])->fetchAll();
        
            if (!empty($result2)) {
                echo '<div class="content1">';
                echo '<h2 class="sub_title">' . htmlspecialchars($result2[0]['sub_title']) . '</h2>';
                if ($categorycode == 'A2') {
                    echo '<img src="./img/sub-img.png"  class="custom_image">';
                }
        
                
                foreach ($result2 as $val) {
                    echo '<div class="box">';
                    if (!empty($val['content'])) {
                        echo '<pre class="con">' . htmlspecialchars($val['content']) . '</pre>';
                    }
                    
                    if (!empty($val['box_title']) && !empty($val['box_con'])) {
                        echo '<pre class="box_title">' . htmlspecialchars($val['box_title']) . '</pre>';
                        echo '<pre class="box_con">' . htmlspecialchars($val['box_con']) . '</pre>';
                    }
                    
                    echo '</div>'; // box
                }
                echo '<div class="top_button_wrap">';
                echo '<a href="#" class="top_button"><img src="./img/arrow-4.png"></a>';
                echo '</div>';
                echo '</div>'; // content1
            }
        
            echo '</div>'; // flex
        
            // 네비게이션 버튼 처리
            if ($categorycode == 'E1') {
                echo '<div class="btn_wrap2">';
                echo '<a class="back5" href="./sub5.php?categorycode=E">';
                echo '<div class="btn_left">';
                echo '<span class="s1">이전글</span>';
                echo '<span class="s2">지역별 온라인 신청문의</span>';
                echo '</div>';
                echo '</a>';
                echo '<a class="next" href="./sub5.php?categorycode=E2">';
                echo '<div class="btn_left">';
                echo '<span class="s1">다음글</span>';
                echo '<span class="s2">주정차 단속 피하는 TIP</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }
        }else  if ($categorycode == 'E3-1' || $categorycode == 'E3-2') {
            echo '<div class="flex">';
            echo '<div class="btn_group">';
            echo '<a href="./sub5.php?categorycode=E">지역별 온라인 신청 문의</a>';
            echo '<a href="./sub5.php?categorycode=E1">교통유발 부담금?</a>';
            echo '<a href="./sub5.php?categorycode=E2">주정차 단속 피하는 TIP</a>';
            echo '<a href="./sub5.php?categorycode=E3-1">주정차사고 당했을 시</a>';
            echo '<a href="./sub5.php?categorycode=E4-1">FAQ</a>';
            echo '</div>';

            $sql2 = "SELECT sub_title, content, box_title FROM content WHERE categorycode = ?";
            $result2 = query($sql2, [$categorycode])->fetchAll();
        
            if (!empty($result2)) {
                echo '<div class="content1">';
                echo '<pre class="sub_title">' . htmlspecialchars($result2[0]['sub_title']) . '</pre>';
                echo '<div class="btn_group2">';
                echo '<a href="./sub5.php?categorycode=E3-1">당했다면?</a>';
                echo '<a href="./sub5.php?categorycode=E3-2">사례</a>';
                echo '</div>';
                echo '<div class="box">';
                foreach ($result2 as $val) {
                    echo '<pre class="box_title">' . htmlspecialchars($val['box_title']) . '</pre>';
                    echo '<pre class="con">' . htmlspecialchars($val['content']) . '</pre>';
                }
                echo '</div>'; // box
                echo '<div class="top_button_wrap">';
                echo '<a href="#" class="top_button"><img src="./img/arrow-4.png"></a>';
                echo '</div>';
                echo '</div>'; // content1
            }
        
            echo '</div>'; // flex
        
            // 네비게이션 버튼 처리
          if ($categorycode == 'E3-1') {
                echo '<div class="btn_wrap2">';
                echo '<a class="back5" href="./sub5.php?categorycode=E2">';
                echo '<div class="btn_left">';
                echo '<span class="s1">이전글</span>';
                echo '<span class="s2">당했다면?</span>';
                echo '</div>';
                echo '</a>';
                echo '<a class="next" href="./sub5.php?categorycode=E3-2">';
                echo '<div class="btn_left">';
                echo '<span class="s1">다음글</span>';
                echo '<span class="s2">사례</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }elseif ($categorycode == 'E3-2') {
                echo '<div class="btn_wrap2">';
                echo '<a class="back5" href="./sub5.php?categorycode=E3-1">';
                echo '<div class="btn_left">';
                echo '<span class="s1">이전글</span>';
                echo '<span class="s2">당했다면?</span>';
                echo '</div>';
                echo '</a>';
                echo '<a class="next" href="./sub5.php?categorycode=E4-1">';
                echo '<div class="btn_left">';
                echo '<span class="s1">다음글</span>';
                echo '<span class="s2">1~3</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }
        }else  if ($categorycode == 'E4-1' || $categorycode == 'E4-2' || $categorycode == 'E4-3') {
            echo '<div class="flex">';
            echo '<div class="btn_group">';
            echo '<a href="./sub5.php?categorycode=E">지역별 온라인 신청 문의</a>';
            echo '<a href="./sub5.php?categorycode=E1">교통유발 부담금?</a>';
            echo '<a href="./sub5.php?categorycode=E2">주정차 단속 피하는 TIP</a>';
            echo '<a href="./sub5.php?categorycode=E3-1">주정차사고 당했을 시</a>';
            echo '<a href="./sub5.php?categorycode=E4-1">FAQ</a>';
            echo '</div>';
        
            $sql2 = "SELECT sub_title, box_con, box_title FROM content WHERE categorycode = ?";
            $result2 = query($sql2, [$categorycode])->fetchAll();
        
            if (!empty($result2)) {
                echo '<div class="content1">';
                echo '<pre class="sub_title">' . htmlspecialchars($result2[0]['sub_title']) . '</pre>';
                echo '<div class="btn_group2">';
                echo '<a href="./sub5.php?categorycode=E4-1">1~3</a>';
                echo '<a href="./sub5.php?categorycode=E4-2">4~6</a>';
                echo '<a href="./sub5.php?categorycode=E4-3">7~10</a>';
                echo '</div>';
                foreach ($result2 as $val) {
                    echo '<div class="box">';
                    echo '<pre class="box_title">' . htmlspecialchars($val['box_title']) . '</pre>';
                    echo '<pre class="box_con">' . htmlspecialchars($val['box_con']) . '</pre>';
                    echo '</div>'; // box
                }
                echo '<div class="top_button_wrap">';
                echo '<a href="#" class="top_button"><img src="./img/arrow-4.png"></a>';
                echo '</div>';
                echo '</div>'; // content1
            }
        
            echo '</div>'; // flex
        
            // 네비게이션 버튼 처리
          if ($categorycode == 'E4-1') {
                echo '<div class="btn_wrap2">';
                echo '<a class="back5" href="./sub5.php?categorycode=E3-2">';
                echo '<div class="btn_left">';
                echo '<span class="s1">이전글</span>';
                echo '<span class="s2">사례</span>';
                echo '</div>';
                echo '</a>';
                echo '<a class="next" href="./sub5.php?categorycode=E4-2">';
                echo '<div class="btn_left">';
                echo '<span class="s1">다음글</span>';
                echo '<span class="s2">4~6</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }else if ($categorycode == 'E4-2') {
                echo '<div class="btn_wrap2">';
                echo '<a class="back5" href="./sub5.php?categorycode=E4-1">';
                echo '<div class="btn_left">';
                echo '<span class="s1">이전글</span>';
                echo '<span class="s2">1~3</span>';
                echo '</div>';
                echo '</a>';
                echo '<a class="next" href="./sub5.php?categorycode=E4-3">';
                echo '<div class="btn_left">';
                echo '<span class="s1">다음글</span>';
                echo '<span class="s2">7~10</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }elseif ($categorycode == 'E4-3') {
                echo '<div class="btn_wrap1">';
                echo '<a class="back5" href="./sub5.php?categorycode=E4-2">';
                echo '<div class="btn_left">';
                echo '<span class="s1">이전글</span>';
                echo '<span class="s2">4~6</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }
        }
            ?>
        </div>
    </div>
</body>
<script>
    // 텍스트 인식
    var preTags = document.getElementsByTagName("pre");
    for (var i = 0; i < preTags.length; i++) {
        var preTag = preTags[i];
        var processedText = preTag.innerHTML;
        processedText = processedText.replace(/\[\[\[(.*?)\]\]\]/gs, '<span class="point1">$1</span>');
        processedText = processedText.replace(/\[\[(.*?)\]\]/gs, '<span class="point2">$1</span>');
        processedText = processedText.replace(/\[(.*?)\]/gs, '<span class="point3">$1</span>');
        preTag.innerHTML = processedText;
    }

    var preTags = document.getElementsByTagName("p");
    for (var i = 0; i < preTags.length; i++) {
        var preTag = preTags[i];
        var processedText = preTag.innerHTML;
        processedText = processedText.replace(/\[\[\[(.*?)\]\]\]/gs, '<span class="point1">$1</span>');
        processedText = processedText.replace(/\[\[(.*?)\]\]/gs, '<span class="point2">$1</span>');
        processedText = processedText.replace(/\[(.*?)\]/gs, '<span class="point3">$1</span>');
        preTag.innerHTML = processedText;
    }
</script>
<script>
    // '탑으로' 버튼 클릭 시 페이지 상단으로 이동하는 스크립트
    document.querySelector('.top_button').addEventListener('click', function(e) {
        e.preventDefault(); // 기본 동작 막기
        window.scrollTo({top: 0, behavior: 'smooth'}); // 스크롤 상단 이동
    });
</script>

</html>
