<header>
<div class="header_wrap">
			<a href="./"><img src="./img/logo.png" alt="주정차단속알리미"></a>
			<ul>
                <li id="li1"><a href="./sub1.php?categorycode=A">주정차단속알림</a></li>
				<li id="li2"><a href="./sub2.php?categorycode=B">과태료</a></li>
				<li id="li3"><a href="./sub3.php?categorycode=C">견인</a></li>
				<li id="li4"><a href="./sub4.php?categorycode=D">교통법규</a></li>
				<li id="li5"><a href="./sub5.php?categorycode=E">정보통통</a></li>
			</ul>
		</div>
</header>
<header class="header_mo">
    <div class="header_wrap">
    <a class="right1 i2"><img src="./img/mo-menu.png" class="ham"></a>
            <h1>
                <a href="./" class="center_logo"><img src="./img/logo.png" alt="주정차단속알리미"></a>
            </h1>
    </div>
        <nav>
            <div class="nav_logo">
                <i class="close"></i>
            </div>
            <ul class="nav_menu">
                <li id="li1"><a href="./sub1.php?categorycode=A">주정차단속알림</a></li>
				<li id="li2"><a href="./sub2.php?categorycode=B">과태료</a></li>
				<li id="li3"><a href="./sub3.php?categorycode=C">견인</a></li>
				<li id="li4"><a href="./sub4.php?categorycode=D">교통법규</a></li>
				<li id="li5"><a href="./sub5.php?categorycode=E">정보통통</a></li>
            </ul>
        </nav>
        <div class="back1"></div>
</header>

<script>
    function getPageName() {
        return window.location.pathname.split('/').pop();
    }

    function getQueryParams() {
            const params = new URLSearchParams(window.location.search);
            return {
                category: params.get('categorycode')
            };
        }

        function setActiveMenu() {
    const { category } = getQueryParams();
    var pageName = getPageName();

    // 데스크톱 메뉴
    var li1Menu = document.getElementById('li1');
    var li2Menu = document.getElementById('li2');
    var li3Menu = document.getElementById('li3');
    var li4Menu = document.getElementById('li4');
    var li5Menu = document.getElementById('li5');

    li1Menu.classList.remove('selected');
    li2Menu.classList.remove('selected');
    li3Menu.classList.remove('selected');
    li4Menu.classList.remove('selected');
    li5Menu.classList.remove('selected');

    // 데스크톱 메뉴 선택 상태 설정
    if (pageName === 'sub1.php') {
        li1Menu.classList.add('selected');
    } else if (pageName === 'sub2.php') {
        li2Menu.classList.add('selected');
    } else if (pageName === 'sub3.php') {
        li3Menu.classList.add('selected');
    } else if (pageName === 'sub4.php') {
        li4Menu.classList.add('selected');
    } else if (pageName === 'sub5.php') {
        li5Menu.classList.add('selected');
    }

    // 모바일 메뉴
    const mobileMenuLinks = document.querySelectorAll('.nav_menu li');
    mobileMenuLinks.forEach(function(li) {
        li.classList.remove('selected');
    });

    const mobileLi1 = document.querySelector('.nav_menu #li1');
    const mobileLi2 = document.querySelector('.nav_menu #li2');
    const mobileLi3 = document.querySelector('.nav_menu #li3');
    const mobileLi4 = document.querySelector('.nav_menu #li4');
    const mobileLi5 = document.querySelector('.nav_menu #li5');

    if (pageName === 'sub1.php') {
        mobileLi1.classList.add('selected');
    } else if (pageName === 'sub2.php') {
        mobileLi2.classList.add('selected');
    } else if (pageName === 'sub3.php') {
        mobileLi3.classList.add('selected');
    } else if (pageName === 'sub4.php') {
        mobileLi4.classList.add('selected');
    } else if (pageName === 'sub5.php') {
        mobileLi5.classList.add('selected');
    }
}

// 페이지 로드 시 실행되는 함수
window.onload = setActiveMenu;

// 링크 클릭 시 setActiveMenu 함수 호출
var menuLinks = document.querySelectorAll('ul li a');
menuLinks.forEach(function(link) {
    link.addEventListener('click', setActiveMenu);
});
    </script>
    <script>
    const menuOpen = document.querySelector('.i2');
    const menuClose = document.querySelector('.close');
    const nav = document.querySelector('nav');
    const back = document.querySelector('.back1');

    function toggleMenu(open) {
        nav.classList.toggle('open', open);
        back.classList.toggle('open', open);
    }

    menuOpen.addEventListener('click', () => toggleMenu(true));
    menuClose.addEventListener('click', () => toggleMenu(false));
</script>
