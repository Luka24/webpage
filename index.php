<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/slog.css">
    <script src="assets/js/dogodki.php"></script>
    <title>Nogometni klub Zlata žoga</title>
</head>
<body>
    <div class="zozan-ovijalni">
        <header>
            <div id="logo">
                <img src="assets/images/logo.png" alt="Logotip">
            </div>
            <nav>
                <ul id="menu">
                    <li><a href="#domov1">Domov</a></li> 
                    <li><a href="#dejavnosti1">Dejavnosti</a></li>
                    <li><a href="#pricevanja1">Pričevanja</a></li>
                    <li><a href="#obvestila">Obvestila</a></li>
                </ul>
            </nav>
            <button id="menu-toggle">☰</button> 
        </header>
        <main>
            <div id="glavna">
                <div class="ovijalni">
                    <div class="opis-prvi">
                        <div id="domov1"></div>
                        <h1>Nogometni klub Zlata žoga</h1>
                        <p>Nogometni klub Zlata žoga je klub, kjer je vsi uživamo ob igranju te lepe igre.</p>
                    </div>
                    <div class="grafika-prvi"></div>
                </div>
            </div>
            <section id="predstavitev">
                <div class="ovijalni">
                    <div class="predstavitev-glava">
                        <div class="ovijalni-mali">
                            <div id="dejavnosti1"></div>
                            <h2 class="naslov-razdelka">Dejavnosti</h2>
                            <p class="odstavek-razdelka">Nogometni klub, kjer se mladi družijo ob igranju nogometa.</p>
                        </div>
                    </div>
                    <div class="predstavitev-vsebina">
                        <div class="predstavitev">
                            <div class="ikona"><img src="assets/images/ikona1.png" alt="Ikona 1"></div>
                            <h3 class="naslov-predstavitve">Trening nogometa</h3>
                            <p class="odstavek-mali">Mladim nogometašem omogočamo trening nogometa.</p>
                        </div>
                        <div class="predstavitev">
                            <div class="ikona"><img src="assets/images/ikona2.png" alt="Ikona 2"></div>
                            <h3 class="naslov-predstavitve">Ogled tekem članske ekipe</h3>
                            <p class="odstavek-mali">Skupaj navijamo za našo člansko ekipo.</p>
                        </div>
                        <div class="predstavitev">
                            <div class="ikona"><img src="assets/images/ikona3.png" alt="Ikona 3"></div>
                            <h3 class="naslov-predstavitve">Najem igrišč</h3>
                            <p class="odstavek-mali">V času, ko igrišča niso zasedena, jih lahko najamete za igro s prijatelji.</p>
                        </div>
                        <div class="predstavitev">
                            <div class="ikona"><img src="assets/images/ikona4.png" alt="Ikona 4"></div>
                            <h3 class="naslov-predstavitve">Praznovanje rojstnih dnevov</h3>
                            <p class="odstavek-mali">Otrokom omogočamo praznovanje rojstnih dnevov z animacijo.</p>
                        </div>
                    </div>
                </div>
            </section>
            <section id="pricevanja">
                <div class="lik lik1"><img src="assets/images/lik1.png" alt="lik 1"></div>
                <div class="lik lik2"><img src="assets/images/lik2.png" alt="lik 2"></div>
                <div class="lik lik3"><img src="assets/images/lik3.png" alt="lik 3"></div>
                <div id="komentarji" class="ovijalni">
                    <div id="pricevanja1"></div>
                    <h2 class="naslov-razdelka">Mnenja članov</h2>
                    <div id="izjave" class="pricevanja-ovijalni"></div>
                </div>
            </section>
            <section id="obvestila">
                <div class="ovijalni-mali">
                    <div class="novice-opis">
                        <h2 class="naslov-razdelka">Novice in obvestila</h2>
                        <p class="odstavek-razdelka">Tu boste našli najnovejše novice in obvestila o našem podjetju.</p>
                    </div>
                    <div id="obrazecNovic" class="novice-obrazec">
                        <form id="form" action="#" method="get">
                            <input type="email" required id="emailVnesen" class="novice-vnos" placeholder="Vnesite svoj e-poštni naslov">
                            <button type="submit" id="emailGumb" class="novice-gumb" name="prijava" value="poslan">PRIJAVA</button>
                        </form>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <div class="ovijalni noga-znotraj svetla-pisava">
                <div class="noga-logo">
                    <a href="#logo"><img src="assets/images/logo.png" alt="Logotip"></a>
                </div>
                <ul class="noga-povezave">
                    <li><a href="#glavna">Domov</a></li>
                    <li><a href="#predstavitev">Dejavnosti</a></li>
                    <li><a href="#pricevanja">Pričevanja</a></li>
                    <li><a href="#obvestila">Obvestila</a></li>
                </ul>
                <ul class="noga-druzabna">
                    <li><img src="assets/images/ikonaFB.svg" alt="Logotip FB"></li>
                    <li><img src="assets/images/ikonaIG.svg" alt="Logotip IG"></li>
                    <li><img src="assets/images/ikonaLI.svg" alt="Logotip LI"></li>
                </ul>
                <div class="noga-copyright">
                    &copy; 2024 Nogometni klub Zlata žoga
                </div>
            </div>
        </footer>
    </div>
    <script>
        /*1*/
        let izjave = document.getElementById("izjave");
        dogodki.forEach(element =>{
            let izjava = document.createElement('div');
            izjava.classList.add("izjava");
            izjave.appendChild(izjava);
            let html = "";
            html += `<div class="img-area"> <img src="${element.slika}" alt="Slika"></div>`;
            html += `<div class="izjava-glava">${element.ime}</div>`;
            html += `<div class="izjava-opis">${element.izjava}</div>`;
            html += `<div class="izjava-noga">${element.datum}</div>`;
            izjava.innerHTML = html;
        });
        /*2*/
        let obrazecNovic = document.getElementById("obrazecNovic");
        let form = document.getElementById("form");
        let gumb = document.getElementById("emailGumb");
        let zapriGumb = document.createElement("button");
        zapriGumb.innerText = "Zapri";
        zapriGumb.setAttribute("type", "button");
        zapriGumb.setAttribute("id", "zapriGumb");
        zapriGumb.setAttribute("value", "zaprto");
        zapriGumb.setAttribute("name", "zapriGumb");   
        let gumbEmail = document.getElementById("emailGumb");
        function akcija(event) {
            let emailVnos = document.getElementById("emailVnesen");
            if(!emailVnos.checkValidity()){
                return;
            }
            event.preventDefault();
            let pozdrav = document.createElement("div");
            form.classList.add("skrij");
            let pozdravText = document.createElement("p");
            pozdravText.classList.add("odstavek-razdelka");
            let pozdravH2 = document.createElement("h2");
            pozdravH2.classList.add("naslov-razdelka");
            pozdravH2.innerText = `Dobrodošli, ${emailVnos.value}!`;
            pozdravText.innerText = `Hvala za prijavo na novice.`;
            pozdrav.appendChild(pozdravH2);
            pozdrav.appendChild(pozdravText);
            obrazecNovic.appendChild(pozdrav);
            obrazecNovic.appendChild(zapriGumb);
        }
        gumb.addEventListener("click", akcija);
        function osveziStran(event){
            location.reload();
        }
        zapriGumb.addEventListener("click", osveziStran);

        let prikazniMenu = document.getElementById("menu-toggle");
            let menu = document.getElementById("menu");
            let linki = document.querySelectorAll("a");

            prikazniMenu.addEventListener("click", function(Event) {
                    
                    menu.classList.toggle("show");

                    linki.forEach(link =>{
                        link.addEventListener("click", function(){
                            menu.classList.remove("show");
                        });
                    });

                    document.addEventListener("click", function(event){
                        if(!menu.contains(event.target) && event.target !== prikazniMenu){
                            menu.classList.remove("show");
                        }
                    })
            });
    </script>
</body>
</html>
