# ECHO - GERENCIAMENTO DE FROTAS ECOLÓGICO


#### EER

![alt text](https://github.com/FelipeRfariasDev/echo/blob/main/Database/EER/diagrama.PNG?raw=true)


git clone https://github.com/LuanODias/Echo-mvc

cd Echo-mvc

composer install

Em App/Models/Connection.php verfique os dados de conexão com o banco de dados.


Siga os seguintes passos para configurar o vhosts no apache

1 -> Acesse o arquivo:

C:\Windows\System32\drivers\etc\hosts

Adicione a linha a baixo no final do arquivo

127.0.0.1 echo-mvc.com.br

Exemplo: https://github.com/FelipeRfariasDev/echo/blob/main/vhosts/hosts

2 -> Acesse o arquivo:

C:\xampp\apache\conf\extra\httpd-vhosts.conf

![alt text](https://github.com/FelipeRfariasDev/echo/blob/main/public/assets/img/virtualhost.PNG?raw=true)

Exemplo: https://github.com/FelipeRfariasDev/echo/blob/main/vhosts/httpd-vhosts.conf

Após as configurações é necessário reiniciar o apache.

Em seguida acesse o endereço http://echo-mvc.com.br/


![alt text](https://github.com/FelipeRfariasDev/echo/blob/main/public/assets/img/home.PNG?raw=true)

### Para visualizar os logs conforme configuramos no VirtualHost

ErrorLog C:\xampp\apache\logs\dummy-host-echo-mvc.example.com-error.log

CustomLog C:\xampp\apache\logs\dummy-host-echo-mvc.example.com-access.log

Exemplos:

    -> https://github.com/FelipeRfariasDev/echo/blob/main/vhosts/dummy-host-echo-mvc.example.com-error.log
    
    -> https://github.com/FelipeRfariasDev/echo/blob/main/vhosts/dummy-host-echo-mvc.example.com-access.log