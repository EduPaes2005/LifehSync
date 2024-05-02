-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/05/2024 às 07:14
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hostinger_lifehsync`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `notebooks`
--

CREATE TABLE `notebooks` (
  `id_notebook` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `content` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `notebooks`
--

INSERT INTO `notebooks` (`id_notebook`, `id_users`, `title`, `cover`, `content`) VALUES
(1, 1, 'Biologia', '../assets/notebooks/Biologia.jpg', '\"É Assim que Acaba\", da renomada autora Colleen Hoover, é uma obra que se destaca no universo literário contemporâneo, oferecendo uma experiência cativante e emocionalmente intensa aos leitores. Neste romance, Hoover mais uma vez demonstra sua habilidade excepcional em explorar temas profundos e complexos, mergulhando nas profundezas das relações humanas e expondo camadas de emoção que ressoam de maneira poderosa.\n\nA trama central gira em torno de uma protagonista intrigante, cuja jornada é marcada por uma série de reviravoltas surpreendentes. O enredo, habilmente construído, não apenas prende a atenção desde as primeiras páginas, mas também conduz o leitor por um labirinto de segredos, dilemas morais e descobertas impactantes. A autora tece uma narrativa que oscila entre o suspense e a profundidade emocional, mantendo uma tensão palpável ao longo de todo o livro.\n\nOs personagens de \"É Assim que Acaba\" são um dos pontos altos da obra. Colleen Hoover apresenta figuras tridimensionais, repletas de nuances e complexidades. Cada personagem é habilmente desenvolvido, permitindo que o leitor se conecte emocionalmente a suas histórias e dilemas. A protagonista, em particular, é uma personagem profundamente humana, com suas fraquezas, forças e uma jornada de autodescoberta que ressoa com autenticidade.\n\nAlém disso, a autora aborda temas sensíveis de maneira sensível e reflexiva. O livro explora questões como perdão, superação e a capacidade de confrontar os próprios demônios internos. Colleen Hoover não tem medo de explorar os lados mais sombrios da psique humana, levando os personagens e, por extensão, os leitores, a enfrentar verdades desconfortáveis.\n\nA prosa de Hoover é envolvente e fluida, tornando a leitura uma experiência envolvente e viciante. A autora domina a arte de construir diálogos autênticos e descrições visualmente ricas, transportando os leitores para o mundo vibrante e muitas vezes angustiante que ela criou.\n\nO desfecho de \"É Assim que Acaba\" é um golpe final impactante que amarra os fios da trama de maneira magistral. As pontas soltas são habilmente resolvidas, proporcionando um fechamento satisfatório para a história, ao mesmo tempo em que deixa espaço para a reflexão duradoura.\n\nEm resumo, \"É Assim que Acaba\" é uma leitura obrigatória para os amantes de romances que desejam mais do que apenas uma narrativa superficial. Colleen Hoover entrega uma obra-prima emocional que transcende as expectativas, estabelecendo-se como uma autora talentosa e visionária. Este livro é uma montanha-russa de emoções, uma jornada literária que permanece gravada na mente do leitor muito tempo depois de virar a última página.'),
(2, 1, 'Sociologia', '../assets/notebooks/Sociologia.jpg', '“É Assim que Começa” é um romance escrito por Colleen Hoover. A história é uma continuação de “É assim que acaba” e segue a vida de Lily Bloom após os eventos do primeiro livro. A trama começa com o retorno de Atlas Corrigan, o primeiro amor de Lily, e a história se desenrola a partir daí.\n\nA narrativa é contada em primeira pessoa e alterna entre os pontos de vista de Lily e Atlas. O livro explora temas como amor, perda, trauma e recomeços. A escrita de Hoover é envolvente e emotiva, e ela consegue criar personagens complexos e realistas.\n\nA história é bem construída e tem um ritmo agradável. Embora a trama seja um pouco previsível em alguns momentos, a escrita de Hoover é forte o suficiente para manter o leitor interessado. O final é satisfatório e fecha a história de uma forma emocionante.\n\nNo geral, “É assim que começa” é uma continuação sólida e bem escrita. Se você gostou do primeiro livro, definitivamente vale a pena ler este. A história é envolvente e emocionante, e os personagens são cativantes. Recomendo este livro para quem gosta de romances emocionantes e bem escritos.'),
(3, 1, 'Geografia', '../assets/notebooks/Geografia.jpg', '\"Por Lugares Incríveis\", da autora Jennifer Niven, é uma obra extraordinária que explora a delicadeza da vida, abordando temas como saúde mental, amizade e o poder da conexão humana. A narrativa é construída em torno de dois personagens complexos e cativantes, Violet Markey e Theodore Finch, cujas vidas se entrelaçam de maneira inesperada.\n\nA trama inicia com um encontro na torre do sino da escola, onde Violet e Finch estão, cada um deles enfrentando suas próprias lutas internas. Finch, conhecido por sua imprevisibilidade e instabilidade emocional, desafia Violet a repensar sua perspectiva sobre a vida. Juntos, eles embarcam em um projeto escolar que os leva a explorar lugares incríveis e a se descobrirem mutuamente.\n\nO livro mergulha nas complexidades da saúde mental, especialmente na abordagem sensível da depressão e do transtorno bipolar, proporcionando uma visão comovente e honesta dessas questões muitas vezes estigmatizadas. A autora lida com esses temas com empatia, destacando a importância do diálogo aberto e do apoio social na jornada para a cura.\n\nJennifer Niven apresenta uma prosa poética e envolvente que capta a essência dos sentimentos humanos. Sua habilidade em criar personagens profundamente autênticos e emocionalmente ressonantes contribui para a imersão do leitor na história. Violet e Finch são retratados de maneira vívida, com todas as suas vulnerabilidades e virtudes, tornando-se personagens com os quais é fácil se identificar e se apegar.\n\nA estrutura narrativa alternada entre as vozes de Violet e Finch oferece uma visão abrangente das experiências individuais de cada personagem, enriquecendo a compreensão do leitor sobre suas jornadas pessoais. A autora também explora o impacto de pequenos gestos e escolhas na vida das pessoas, reforçando a ideia de que a empatia e a compaixão podem desempenhar um papel fundamental na superação das adversidades.\n\nO desfecho de \"Por Lugares Incríveis\" é comovente e provocativo, deixando uma impressão duradoura na mente do leitor. A autora consegue equilibrar magistralmente a tristeza e a esperança, proporcionando uma conclusão que é ao mesmo tempo emocionalmente impactante e reflexiva.\n\nEm resumo, \"Por Lugares Incríveis\" é uma obra-prima que vai muito além de ser apenas um romance adolescente. Jennifer Niven oferece uma narrativa poderosa que não apenas entretém, mas também inspira reflexões sobre a importância da compaixão, amizade e da jornada para a cura. Este é um livro que deixa uma marca profunda e duradoura, instigando os leitores a considerar a fragilidade e a beleza da vida.'),
(4, 1, 'Química', '../assets/notebooks/Química.jpg', '\"Orgulho e Preconceito\", da icônica autora britânica Jane Austen, é uma obra-prima da literatura clássica que continua a encantar leitores ao longo de gerações. Publicado pela primeira vez em 1813, o romance é uma brilhante comédia de costumes que aborda questões sociais, amor e preconceitos com uma sagacidade afiada e uma prosa elegante.\n\nA trama gira em torno da protagonista Elizabeth Bennet, uma jovem inteligente e espirituosa que, em meio à sociedade aristocrática da Inglaterra do século XIX, se encontra em uma teia de complexidades sociais, intriga e, claro, romance. O enredo se desenvolve com maestria à medida que Elizabeth lida com as expectativas sociais, as pressões matrimoniais e seus próprios preconceitos, especialmente em relação ao enigmático Sr. Darcy.\n\nO grande mérito de Austen reside na habilidade de criar personagens vivos e memoráveis. Elizabeth Bennet é uma heroína à frente de seu tempo, uma mulher que desafia as convenções sociais e busca o amor verdadeiro e a realização pessoal. Mr. Darcy, por sua vez, é um dos heróis literários mais fascinantes, inicialmente retratado como orgulhoso e reservado, mas revelando uma complexidade emocional que cativa o leitor.\n\nO estilo de escrita de Jane Austen é elegante e perspicaz. Seus diálogos são afiados, cheios de ironia e humor sutil, proporcionando uma visão perspicaz das complexidades sociais da época. A autora utiliza a comédia para expor as fraquezas da sociedade e dos personagens, criando uma narrativa que vai além de uma simples história de amor, abordando questões mais profundas de classe, moralidade e autenticidade.\n\n\"Orgulho e Preconceito\" também se destaca pela habilidade de Austen em criar cenários vívidos e atmosferas detalhadas. A descrição das paisagens e salões de baile transporta o leitor para a Inglaterra do século XIX, oferecendo uma imersão completa na época e no ambiente social.\n\nO romance culmina em uma conclusão satisfatória que não apenas resolve as tramas românticas, mas também proporciona uma reflexão sobre o valor da autenticidade e da superação de preconceitos pessoais. A mensagem atemporal de \"Orgulho e Preconceito\" sobre a importância da verdadeira compreensão e do amor baseado na igualdade continua a ressoar, tornando este clássico literário uma leitura essencial para todos os amantes da literatura.\n\nEm resumo, \"Orgulho e Preconceito\" é uma obra que transcende as barreiras do tempo, continuando a encantar e inspirar leitores com sua astúcia, profundidade e observações aguçadas sobre a natureza humana e a sociedade.'),
(5, 1, 'Matemática', '../assets/notebooks/Matemática.jpg', '\"Daisy Jones & The Six\", escrito por Taylor Jenkins Reid, é uma obra-prima literária que transcende os limites do convencional ao oferecer uma narrativa envolvente e única. Ambientado no vibrante cenário musical dos anos 1970, o romance se desdobra por meio de uma estrutura de entrevistas fictícias, proporcionando uma experiência de leitura incomparável e profundamente imersiva.\n\nA trama gira em torno da banda fictícia The Six e da enigmática Daisy Jones, uma talentosa cantora e compositora. Reid habilmente constrói a narrativa por meio das vozes dos personagens, cada um oferecendo sua perspectiva sobre os eventos que moldaram a ascensão e eventual queda da banda. Essa abordagem única adiciona uma camada de autenticidade à história, como se os leitores estivessem testemunhando diretamente as entrevistas e conhecendo os pensamentos íntimos dos músicos.\n\nOs personagens são um dos pontos mais fortes do livro. Cada membro da banda é habilmente desenvolvido, com personalidades distintas, lutas internas e complexidades emocionais. Daisy Jones, em particular, emerge como uma figura fascinante, com sua aura magnética e tumultuado relacionamento com os outros membros da banda. A autora explora temas como amor, ambição, vício e o preço da fama com uma sensibilidade que adiciona profundidade emocional à narrativa.\n\nA ambientação nos anos 1970 é vividamente retratada, com a autora capturando a efervescência cultural da época, desde os excessos das festas até a música revolucionária que moldou toda uma geração. A linguagem utilizada por Reid é autêntica e evocativa, transportando os leitores para o coração pulsante da cena musical da época.\n\nA estrutura não linear da narrativa é um dos aspectos mais notáveis de \"Daisy Jones & The Six\". Reid manipula habilmente o tempo, revelando peças do quebra-cabeça de forma gradual e mantendo os leitores intrigados do início ao fim. A construção do enredo é como uma colagem meticulosa, onde cada fragmento contribui para a compreensão completa da história.\n\nO desfecho é emocionante e, ao mesmo tempo, satisfatório. Reid fecha os arcos narrativos de maneira impactante, oferecendo aos leitores uma conclusão que ressoa e deixa uma impressão duradoura. A abordagem inovadora e a execução magistral fazem de \"Daisy Jones & The Six\" uma leitura imperdível para os amantes da música, da cultura dos anos 1970 e da literatura que desafia as convenções tradicionais. Este livro é uma obra-prima moderna que transcende o gênero e deixa uma marca indelével na mente daqueles que se aventuram por suas páginas.'),
(6, 1, 'Educação Física', '../assets/notebooks/EducaçãoFísica.jpg', '\"A Hora da Estrela\" é uma obra-prima literária do renomado autor brasileiro Clarice Lispector. Publicado em 1977, o livro é um testemunho da genialidade da escritora, explorando temas profundos e apresentando uma narrativa complexa e envolvente. O romance, que se revela como um ato de introspecção e reflexão, mergulha nas camadas da existência humana, proporcionando uma experiência literária única e impactante.\n\nA protagonista, Macabéa, é uma jovem nordestina que migra para o Rio de Janeiro em busca de uma vida melhor, mas que se encontra perdida em meio à solidão e à pobreza. Clarice Lispector habilmente tece a história dessa personagem aparentemente comum, mas extraordinariamente singular, explorando as nuances de sua existência e revelando sua humanidade de maneira crua e poética.\n\nO estilo literário de Lispector é uma das marcas registradas de \"A Hora da Estrela\". Sua prosa é introspectiva e poética, carregada de simbolismos e reflexões filosóficas. A autora desafia as convenções narrativas tradicionais, conduzindo o leitor por uma jornada de autodescoberta tanto da personagem principal quanto de si mesmo. Cada palavra parece escolhida com cuidado, contribuindo para a construção de uma atmosfera densa e introspectiva.\n\nAo longo do romance, Clarice Lispector incorpora elementos metaficcionais, interagindo diretamente com o leitor e desafiando as fronteiras entre ficção e realidade. Esse aspecto confere à obra uma profundidade adicional, convidando o leitor a questionar não apenas a história de Macabéa, mas também sua própria compreensão da narrativa e da existência.\n\n\"A Hora da Estrela\" também aborda questões sociais e econômicas do Brasil da época, oferecendo uma crítica sutil às desigualdades e injustiças que permeiam a sociedade. Macabéa é, de certa forma, uma representação simbólica das pessoas marginalizadas e esquecidas, e seu destino serve como uma reflexão dolorosa sobre a condição humana.\n\nO desfecho do romance é impactante e deixa uma impressão duradoura. Clarice Lispector fecha a narrativa de forma magistral, consolidando a obra como uma reflexão profunda sobre a vida, a morte e a busca por significado. \"A Hora da Estrela\" não é apenas uma leitura, mas uma experiência literária que desafia, provoca e emociona.\n\nEm resumo, \"A Hora da Estrela\" é uma obra-prima da literatura brasileira que transcende fronteiras culturais e temporais. Clarice Lispector eleva a narrativa a um nível de arte, explorando os cantos mais sombrios e luminosos da condição humana. Este livro é mais do que uma história; é uma jornada filosófica e emocional que continua a ressoar muito tempo depois de a última página ser virada.'),
(7, 1, 'História', '../assets/notebooks/História.jpg', '\"Harry Potter e a Pedra Filosofal\", escrito por J.K. Rowling e publicado em 1997, é o primeiro volume da icônica série de livros que cativou leitores de todas as idades ao redor do mundo. O livro introduz os leitores ao mundo mágico e maravilhoso de Hogwarts, proporcionando uma jornada emocionante repleta de magia, amizade e autodescoberta.\n\nA história começa com Harry Potter, um órfão que vive com seus cruéis tios e primo em um armário sob a escada. No seu décimo primeiro aniversário, Harry descobre que é, na verdade, um bruxo e recebe uma carta de aceitação para ingressar na Escola de Magia e Bruxaria de Hogwarts. A partir desse momento, sua vida muda radicalmente, dando início a uma aventura extraordinária.\n\nEm Hogwarts, Harry faz amizade com Ron Weasley e Hermione Granger, formando o trio principal da série. Juntos, eles embarcam em uma jornada para desvendar os mistérios que cercam a pedra filosofal, um objeto mágico que concede a imortalidade. A trama é impulsionada pela ameaça de um bruxo das trevas, Lord Voldemort, cuja busca pela pedra representa um perigo constante para Harry e seus amigos.\n\nA construção do mundo mágico de Rowling é excepcional, com detalhes meticulosos sobre criaturas mágicas, poções, feitiços e a história do mundo bruxo. A escola de Hogwarts se torna um ambiente rico para o desenvolvimento de personagens e a exploração de temas como coragem, lealdade e o confronto entre o bem e o mal.\n\nA narrativa também aborda a jornada de autodescoberta de Harry, que descobre mais sobre seu passado e suas habilidades mágicas únicas. O caráter heroico de Harry se destaca, não apenas por suas habilidades, mas também por sua integridade e compaixão, valores que o definirão ao longo da série.\n\nAlém disso, \"A Pedra Filosofal\" estabelece as bases para arcos de personagens mais amplos e para os mistérios que se desdobrarão ao longo dos sete livros. A escrita envolvente de Rowling e seu talento para criar reviravoltas surpreendentes mantêm os leitores ávidos por mais.\n\nEste livro inaugura uma saga que não apenas capturou a imaginação de leitores em todo o mundo, mas também se tornou um fenômeno cultural. \"Harry Potter e a Pedra Filosofal\" é uma obra-prima que transcende as idades, uma introdução mágica a um universo encantador que continua a inspirar gerações de leitores a se perderem nos corredores de Hogwarts e a acreditar na magia que existe dentro de cada um de nós.'),
(8, 1, 'Português', '../assets/notebooks/Português.jpg', '\"Mrs Dalloway\", escrito por Virginia Woolf e publicado em 1925, é uma obra-prima modernista que explora a complexidade da mente humana, a sociedade pós-Primeira Guerra Mundial e a busca por significado na vida cotidiana. O romance é conhecido por sua narrativa experimental e pela profunda introspecção psicológica de seus personagens.\n\nA história se passa em um único dia, quando Clarissa Dalloway, uma mulher da alta sociedade londrina, está ocupada preparando uma festa que ocorrerá naquela noite. Ao longo do dia, o leitor é levado não apenas pelos eventos externos, mas também pelas correntes de pensamento íntimas e complexas dos personagens principais.\n\nO fluxo de consciência é uma técnica literária notável utilizada por Woolf, permitindo que os leitores acessem os pensamentos internos dos personagens de maneira quase ininterrupta. A história não se desenrola linearmente, mas sim através de associações de pensamentos, memórias e reflexões profundas.\n\nClarissa Dalloway é a protagonista central, uma mulher elegante e socialmente respeitável, mas que carrega uma profunda busca por significado em sua vida. Seus pensamentos são entrelaçados com os de Septimus Warren Smith, um veterano traumatizado de guerra, cuja narrativa paralela destaca as cicatrizes invisíveis deixadas pelo conflito e as tensões emocionais da sociedade pós-guerra.\n\nO romance explora temas como a passagem do tempo, as expectativas sociais, a natureza efêmera da vida e a complexidade das relações humanas. A festa planejada por Clarissa serve como um ponto focal para reunir uma variedade de personagens, cada um enfrentando suas próprias lutas e dilemas existenciais.\n\nA escrita de Woolf é marcada por sua prosa lírica e sua habilidade em capturar a riqueza das experiências interiores. Ela desafia as convenções narrativas tradicionais, proporcionando uma visão profunda da psique humana e da interconexão entre as vidas de diferentes personagens.\n\n\"Mrs Dalloway\" é uma obra-prima que transcende sua época, continuando a ser estudada e apreciada pela sua inovação literária e pela exploração corajosa das complexidades da mente humana. Virginia Woolf, com sua habilidade única, oferece uma janela para as profundezas da alma e uma reflexão sobre a busca constante por identidade, significado e conexão em um mundo em constante transformação.'),
(9, 2, 'Harry Potter e a Pedra Filosofal', '../assets/notebooks/Livro7.svg', '\"Harry Potter e a Pedra Filosofal\", escrito por J.K. Rowling e publicado em 1997, é o primeiro volume da icônica série de livros que cativou leitores de todas as idades ao redor do mundo. O livro introduz os leitores ao mundo mágico e maravilhoso de Hogwarts, proporcionando uma jornada emocionante repleta de magia, amizade e autodescoberta.\n\nA história começa com Harry Potter, um órfão que vive com seus cruéis tios e primo em um armário sob a escada. No seu décimo primeiro aniversário, Harry descobre que é, na verdade, um bruxo e recebe uma carta de aceitação para ingressar na Escola de Magia e Bruxaria de Hogwarts. A partir desse momento, sua vida muda radicalmente, dando início a uma aventura extraordinária.\n\nEm Hogwarts, Harry faz amizade com Ron Weasley e Hermione Granger, formando o trio principal da série. Juntos, eles embarcam em uma jornada para desvendar os mistérios que cercam a pedra filosofal, um objeto mágico que concede a imortalidade. A trama é impulsionada pela ameaça de um bruxo das trevas, Lord Voldemort, cuja busca pela pedra representa um perigo constante para Harry e seus amigos.\n\nA construção do mundo mágico de Rowling é excepcional, com detalhes meticulosos sobre criaturas mágicas, poções, feitiços e a história do mundo bruxo. A escola de Hogwarts se torna um ambiente rico para o desenvolvimento de personagens e a exploração de temas como coragem, lealdade e o confronto entre o bem e o mal.\n\nA narrativa também aborda a jornada de autodescoberta de Harry, que descobre mais sobre seu passado e suas habilidades mágicas únicas. O caráter heroico de Harry se destaca, não apenas por suas habilidades, mas também por sua integridade e compaixão, valores que o definirão ao longo da série.\n\nAlém disso, \"A Pedra Filosofal\" estabelece as bases para arcos de personagens mais amplos e para os mistérios que se desdobrarão ao longo dos sete livros. A escrita envolvente de Rowling e seu talento para criar reviravoltas surpreendentes mantêm os leitores ávidos por mais.\n\nEste livro inaugura uma saga que não apenas capturou a imaginação de leitores em todo o mundo, mas também se tornou um fenômeno cultural. \"Harry Potter e a Pedra Filosofal\" é uma obra-prima que transcende as idades, uma introdução mágica a um universo encantador que continua a inspirar gerações de leitores a se perderem nos corredores de Hogwarts e a acreditar na magia que existe dentro de cada um de nós.'),
(10, 2, 'Mrs Dalloway', '../assets/notebooks/Livro8.svg', '\"Mrs Dalloway\", escrito por Virginia Woolf e publicado em 1925, é uma obra-prima modernista que explora a complexidade da mente humana, a sociedade pós-Primeira Guerra Mundial e a busca por significado na vida cotidiana. O romance é conhecido por sua narrativa experimental e pela profunda introspecção psicológica de seus personagens.\n\nA história se passa em um único dia, quando Clarissa Dalloway, uma mulher da alta sociedade londrina, está ocupada preparando uma festa que ocorrerá naquela noite. Ao longo do dia, o leitor é levado não apenas pelos eventos externos, mas também pelas correntes de pensamento íntimas e complexas dos personagens principais.\n\nO fluxo de consciência é uma técnica literária notável utilizada por Woolf, permitindo que os leitores acessem os pensamentos internos dos personagens de maneira quase ininterrupta. A história não se desenrola linearmente, mas sim através de associações de pensamentos, memórias e reflexões profundas.\n\nClarissa Dalloway é a protagonista central, uma mulher elegante e socialmente respeitável, mas que carrega uma profunda busca por significado em sua vida. Seus pensamentos são entrelaçados com os de Septimus Warren Smith, um veterano traumatizado de guerra, cuja narrativa paralela destaca as cicatrizes invisíveis deixadas pelo conflito e as tensões emocionais da sociedade pós-guerra.\n\nO romance explora temas como a passagem do tempo, as expectativas sociais, a natureza efêmera da vida e a complexidade das relações humanas. A festa planejada por Clarissa serve como um ponto focal para reunir uma variedade de personagens, cada um enfrentando suas próprias lutas e dilemas existenciais.\n\nA escrita de Woolf é marcada por sua prosa lírica e sua habilidade em capturar a riqueza das experiências interiores. Ela desafia as convenções narrativas tradicionais, proporcionando uma visão profunda da psique humana e da interconexão entre as vidas de diferentes personagens.\n\n\"Mrs Dalloway\" é uma obra-prima que transcende sua época, continuando a ser estudada e apreciada pela sua inovação literária e pela exploração corajosa das complexidades da mente humana. Virginia Woolf, com sua habilidade única, oferece uma janela para as profundezas da alma e uma reflexão sobre a busca constante por identidade, significado e conexão em um mundo em constante transformação.'),
(11, 2, 'As Crônicas de Nárnia', '../assets/notebooks/Livro9.svg', '\"As Crônicas de Nárnia\" é uma série de sete livros escritos por C.S. Lewis entre 1949 e 1954, sendo uma das obras mais queridas e influentes da literatura infantil e juvenil. A série combina elementos de fantasia, alegoria e mitologia, transportando os leitores para um mundo mágico repleto de aventuras e significados mais profundos.\r\n\r\nOs livros, em ordem cronológica de publicação, são:\r\n\r\n\"O Leão, a Feiticeira e o Guarda-Roupa\" (1950)\r\n\"Príncipe Caspian\" (1951)\r\n\"A Viagem do Peregrino da Alvorada\" (1952)\r\n\"A Cadeira de Prata\" (1953)\r\n\"O Cavalo e Seu Menino\" (1954)\r\n\"O Sobrinho do Mago\" (1955)\r\n\"A Última Batalha\" (1956)\r\nA história principal da série gira em torno de um grupo de crianças que, ao explorar uma série de mundos mágicos através de portais como guarda-roupas e quadros, se envolvem em eventos épicos que moldam o destino de Nárnia e além.\r\n\r\nO personagem central e figura icônica é o leão Aslam, que desempenha um papel significativo em todos os livros. Ele é uma representação de uma figura divina, com C.S. Lewis incorporando elementos teológicos em sua obra, proporcionando uma dimensão mais profunda à narrativa.\r\n\r\nCada livro apresenta uma nova aventura com personagens diferentes, enquanto, ao mesmo tempo, contribui para a trama geral da série. \"As Crônicas de Nárnia\" exploram temas como coragem, lealdade, sacrifício, redenção e a luta entre o bem e o mal.\r\n\r\nUma característica notável da série é a habilidade de C.S. Lewis em criar um mundo encantado cheio de criaturas mágicas, terras exóticas e eventos extraordinários, enquanto também oferece insights sobre questões filosóficas e morais. A obra é habilmente escrita para atrair tanto leitores jovens quanto adultos.\r\n\r\nAo longo dos anos, \"As Crônicas de Nárnia\" tornaram-se clássicos da literatura infantil, apreciados por gerações de leitores. A série foi adaptada para o cinema e a televisão, mas é nos livros originais que a magia atemporal de Nárnia verdadeiramente ganha vida.'),
(12, 2, 'A Coragem de Ser Imperfeito', '../assets/notebooks/Livro10.svg', '\" A Coragem de Ser Imperfeito \" é um livro escrito por Brené Brown, uma pesquisadora e professora que se tornou conhecida por seu trabalho sobre vulnerabilidade, vergonha e empatia. Publicado originalmente em 2010 com o título \"The Gifts of Imperfection\", a obra explora o conceito de viver uma vida autêntica e plena, abraçando nossas imperfeições em vez de tentar escondê-las ou suprimi-las.\n\nBrown argumenta que a busca pela perfeição é uma armadilha que muitos de nós caímos, e que essa busca incessante por sermos impecáveis e inatingíveis pode levar a sentimentos de inadequação, vergonha e desconexão. Em vez disso, ela defende que devemos abraçar nossa vulnerabilidade e aceitar que somos humanos, com falhas e limitações. Através desse processo de aceitação, podemos encontrar uma verdadeira sensação de plenitude e contentamento.\n\nO livro é dividido em dez guias para uma vida inteira, cada um abordando diferentes aspectos da jornada para a autenticidade e a coragem de sermos nós mesmos. Brown discute temas como cultivar a gratidão, estabelecer limites saudáveis, desenvolver a compaixão por nós mesmos e pelos outros, e reconhecer o valor de nossa própria história pessoal.\n\nAo longo do texto, Brown compartilha insights de suas próprias experiências pessoais, bem como de sua pesquisa acadêmica, oferecendo exemplos práticos e exercícios para ajudar os leitores a aplicar esses conceitos em suas próprias vidas. Sua escrita é acessível e envolvente, e ela usa uma mistura de histórias pessoais, pesquisa científica e sabedoria prática para transmitir sua mensagem inspiradora.\n\nEm última análise, \"A Coragem de Ser Imperfeito\" é um convite para uma vida mais autêntica e significativa, livre das amarras da perfeição e da autocondenação. É um lembrete gentil de que nossas imperfeições não nos tornam inadequados, mas sim humanos, e que ao abraçá-las, podemos encontrar uma maior conexão consigo mesmo e com os outros.'),
(13, 2, 'Os Sete Maridos de Evelyn Hugo', '../assets/notebooks/Livro11.svg', '\"Os Sete Maridos de Evelyn Hugo\" é um romance escrito por Taylor Jenkins Reid, que narra a extraordinária vida de uma icônica estrela de cinema, Evelyn Hugo, através das lentes de sua relação com os homens que ela escolheu para serem seus maridos. Publicado em 2017, o livro se desenrola através de uma entrevista exclusiva concedida por Evelyn a uma jovem jornalista chamada Monique Grant, revelando detalhes nunca antes compartilhados de sua vida.\n\nA narrativa é habilmente estruturada, alternando entre os pontos de vista de Evelyn e Monique, criando uma história cativante que mergulha fundo nos segredos, amores e traições da vida de Evelyn. Ao longo do livro, acompanhamos Evelyn desde seus humildes começos como uma jovem cubana em Hollywood até o auge de sua carreira como uma das maiores estrelas do cinema.\n\nO aspecto mais cativante do romance é a complexidade de Evelyn Hugo como personagem. Ela é retratada como uma mulher ambiciosa, destemida e muitas vezes controversa, disposta a fazer o que for necessário para alcançar seus objetivos, mesmo que isso signifique sacrificar relacionamentos pessoais. No entanto, ao mesmo tempo, ela é profundamente humana, lutando com suas próprias vulnerabilidades e desejos.\n\nAlém disso, o romance aborda questões importantes como identidade, sexualidade, amor e fama, explorando como esses elementos se entrelaçam na vida de uma figura pública como Evelyn Hugo. Reid também oferece uma crítica perspicaz da indústria do entretenimento e do preço da fama, destacando os desafios enfrentados por mulheres em um mundo dominado por homens.\n\nAo longo do livro, o leitor é levado por reviravoltas inesperadas e revelações surpreendentes, mantendo o suspense até o final. A escrita de Reid é envolvente e emotiva, capturando perfeitamente a atmosfera de glamour de Hollywood, ao mesmo tempo em que mergulha nas complexidades emocionais de seus personagens.\n\nEm última análise, \"Os Sete Maridos de Evelyn Hugo\" é uma história poderosa sobre amor, sacrifício e autenticidade, que ressoa muito além das páginas do livro. É uma leitura obrigatória para qualquer pessoa interessada em dramas humanos profundos e envolventes.'),
(14, 2, 'Dom Casmurro', '../assets/notebooks/Livro12.svg', '\"Dom Casmurro\" é uma obra-prima da literatura brasileira escrita por Machado de Assis e publicada em 1899. O romance é uma narrativa envolvente que mergulha nas complexidades da mente humana, explorando temas como amor, ciúme, traição e memória.\n\nA história é narrada em primeira pessoa por Bento Santiago, apelidado de Dom Casmurro, um homem mais velho que relembra sua juventude e seu relacionamento com Capitu, sua amiga de infância e amor de sua vida. A trama se desenrola principalmente em torno do ciúme doentio de Bentinho, que começa a suspeitar da fidelidade de Capitu, especialmente em relação ao seu amigo de infância Escobar.\n\nO que torna \"Dom Casmurro\" uma obra tão fascinante é a maneira como Machado de Assis brinca com a percepção do leitor, deixando espaço para interpretações variadas sobre os eventos que ocorrem. A ambiguidade em torno da fidelidade de Capitu é uma das características mais marcantes do romance, levando os leitores a questionarem as verdadeiras intenções e ações dos personagens.\n\nAlém disso, Machado de Assis é mestre na construção de personagens complexos e multifacetados. Bentinho é um protagonista profundamente humano, cujas imperfeições e fraquezas o tornam incrivelmente realista e cativante. Capitu, por sua vez, é retratada como uma mulher forte e enigmática, cujas motivações permanecem um mistério até o final do livro.\n\nA estrutura narrativa de \"Dom Casmurro\" também é notável, com Machado de Assis alternando entre a narrativa principal e digressões que acrescentam camadas adicionais à história. Esses desvios da trama principal muitas vezes oferecem reflexões sobre temas mais amplos, como sociedade, religião e moralidade.\n\nNo geral, \"Dom Casmurro\" é uma obra-prima da literatura mundial que continua a intrigar e fascinar os leitores até hoje. Com sua prosa elegante, personagens inesquecíveis e trama cheia de reviravoltas, o romance de Machado de Assis é um verdadeiro clássico que merece ser lido e apreciado por gerações.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notepads`
--

CREATE TABLE `notepads` (
  `id_notepad` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `content` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `imgProfile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `modality` enum('Trabalho','Leitura','Estudo','Outros...') DEFAULT NULL,
  `levelAccess` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id_user`, `username`, `imgProfile`, `email`, `password`, `modality`, `levelAccess`) VALUES
(1, 'Edu.paes_', '../assets/EduardoAccount.svg', 'eduardo.l.p05@gmail.com', '$2y$10$8CHIyHLPy/0In9R1N5BmVuyYWVpSxi1bHl8.Z64F1VHjkbomd5.Pq', 'Estudo', 0),
(2, 'Silvana.paes_', '../assets/SilvanaAccount.jpg', 'silvanasilvapaes307@gmail.com', '$2y$10$EnS3pSEMpr2lHIGFOrg99.gK.DAlF.RDnezl/ALJmxFd/QjJYdkcG', 'Trabalho', 0),
(3, 'Paulo_Neves', '', 'paulloocesar98@gmail.com', '$2y$10$lkgwmK53jATIsGnnMP9zS.dIOtTw3tpZdboUOiUiRMv50pKGVDaqW', 'Trabalho', 0),
(4, 'Manucamillyy', '../assets/EmanuelleAccount.jpg', 'manubento1907@gmail.com', '$2y$10$g49HShOowrUJ9D2BNm1/FuRHvN8xfrS95d.gOXudh6c0p1V8JmGDm', 'Leitura', 0),
(5, 'Alexsandra', '', 'ale@gmail.com', '$2y$10$X07pLJUmqG3OzJsSvHz8hO3cby8dYpOFMeOEGvnm9Jq/KdloLuxfa', 'Estudo', 0),
(6, 'Donatham', '', 'donathan@gmail.com', '$2y$10$U47Cs76v50d50/UShaE6JuJ9ZZK6RTQCGj9u3CeyOs4iV4MSxkprC', NULL, 0),
(7, 'Melissamoll', '', 'moll@gmail.com', '$2y$10$sYe3wg2nFfx.CI8UGMVd9eRYhAPnBRWB7pasV0Axu4r8WlNHWi83K', 'Trabalho', 0),
(8, 'Teste.123_', '', 'teste@gmail.com', '$2y$10$ZP5dh/kURgWylN3mIeCo4OznSRyaaz9hjzuusd6sbBnAgQBTaIlmm', '', 1),
(9, 'Annalinaes', '../assets/AnnaAccount.jpg', 'annalinaes602@gmail.com', '$2y$10$Cy7xXsYloR3O.tycQW6CPOtr0qu/kCiJtOxpU08pceuiDRSEQXNui', 'Trabalho', 0),
(10, 'Tv.box_', '', 'tvbox@gmail.com', '$2y$10$jj.YUIUEGqWx8YzEPEpgb.QM2o.fSl3y7.KePooYYcPDfZhXVga5W', 'Estudo', 0),
(11, 'Gilcilei.paes_', '../assets/GilcileiAccount.jpg', 'gilcilei.l.p27@gmail.com', '$2y$10$HBibBGWJ9XbTb/7TFtZu4OUmDgkOIUBW497drS0utrkLk7S.QSLpi', 'Trabalho', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `notebooks`
--
ALTER TABLE `notebooks`
  ADD PRIMARY KEY (`id_notebook`);

--
-- Índices de tabela `notepads`
--
ALTER TABLE `notepads`
  ADD PRIMARY KEY (`id_notepad`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `notebooks`
--
ALTER TABLE `notebooks`
  MODIFY `id_notebook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `notepads`
--
ALTER TABLE `notepads`
  MODIFY `id_notepad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
