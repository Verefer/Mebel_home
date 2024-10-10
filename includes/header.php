<header>
                <div class="headerleft">
                        <div class="logo">
                                <img src="../assets/images/logo.png" alt="Logo">    
                        </div>
                        <a href="tel:+79507981372" class="sitename">+7-950-798-13-72</a>
                </div>
                <div class="headerright">
                        <a href="#abou" class="abou" onclick="showContent('visible')">О нас</a>
                        <a href="#contact" onclick="showContent('visible')">Контакты</a>
                        <a href="#pric" onclick="showContent('visible')">Цены</a>
                        <div class="btnzakaz">
                                <a href="#" onclick="showContent('zakaz')">Заказать</a>
                                
                         <script>
        function showContent(id) {
            // Получаем все элементы содержимого
            var contentDivs = document.querySelectorAll('content > div');

            // Проходимся по всем элементам содержимого
            for (var i = 0; i < contentDivs.length; i++) {
                var div = contentDivs[i];
                // Скрываем все элементы, кроме того, который соответствует id
                if (div.id === id) {
                    div.classList.remove('hidden');
                } else {
                    div.classList.add('hidden');
                }
            }
        }
    </script>
    
                        </div>
                        
                </div>
        </header>