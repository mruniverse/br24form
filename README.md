# Seleção - Desenvolvedor Br24
- ### Desenvolvimento
    Esta aplicação foi desenvolvida em PHP O.O (Object Oriented).
    Toda a aplicação foi desenvolvida voltada para a Rest api do Bitrix.
    
    A fim de aumentar o padrão de seguraça do acesso a api, resolvi 
    manter o uso do OAuth 2.0 ao invés do tradicional webhook, que
    permite chamadas rest api de qualquer lugar a qualquer momento. Dessa
    forma, se tornou necessária a instalação local do aplicativo, direto 
    no portal do bitrix.
    
    - Para o sistema de rotas, utilizei um pequeno framework chamado
        [Slim Framework](https://github.com/slimphp/Slim). Através do
        framework, todas as chamadas se tornam mais claras e
        organizadas, tanto no código, quanto para as urls.
        
    - Toda organização do código foi feita com base no padrão MVC, 
    dessa maneira, mantendo, organizando, e padronizando o projeto
    de forma mais eficiênte.
    
    - Como forma de hospedagem, utilizei a plataforma 
    [Heroku](www.heroku.com), que, além de hospedar 
    minha aplicação na nuvem, fornece certificado SSL. Isto
    permitiu o desenvolvimento do projeto utilizando a Rest api
    do portal Bitrix.
    
- ### Instalação
    Para instalar o aplicativo em um novo portal, é necessário, primeiramente,
    a hospedagem em uma plataforma que fornece cerifico ssl (HTTPS).
    
    Depois, será necessário alterar os dados de autenticação do OAuth, 
     respectivos aos dados que se encontram ao criar uma aplicação
     no portal, que se encontram no arquivo "settings.php", 
     dentro do diretório do [CRest](https://github.com/bitrix-tools/crest).
    
    E por último, também será necessário fornecer o caminho para o 
    arquivo de instalação do aplicativo, este arquivo fornece todos 
    os dados necessários para realizar a autenticação e iniciar o 
    aplicativo. O caminho é: `https://sua-url.com.br/install`
    
- ### Observações

    No início do projeto, optei por utilizar o 
    [Framework Laravel](https://github.com/laravel/laravel) para 
    o desenvolvimento. Contudo, notei que além de ser um framework
    de alto porte para uma aplicação um tanto quanto simples, ocorreram
    algumas incompatibilidades em diversos aspectos, tanto nas requisições
    quanto diretamente com a plataforma. Claro, com alguns ajustes,
    é totalmente possível, contudo, para evitar maiores desgastes futuros,
    resolvi utilizar outras ferramentas.
