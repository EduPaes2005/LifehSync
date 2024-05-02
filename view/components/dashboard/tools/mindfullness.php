        <div id="Mindfullness" class="tool-content">
            <div id="circle"></div>
        </div>

        <script>
            const circle = document.getElementById('circle');
            var words = ['Inspirar', 'Expirar'];
            let index = 0;

            function animateCircle() {
                if (index >= words.length) {
                    index = 0;
                }

                var word = words[index];

                if (word === 'Inspirar' || word === 'Inspire') {
                    circle.style.transform = 'scale(1.5)';
                } else if (word === 'Expirar' || word === 'Expire') {
                    circle.style.transform = 'scale(1)';
                }

                circle.textContent = word;
                index++;

                setTimeout(() => {
                    animateCircle();
                }, 4000);
            }

            animateCircle();
        </script>