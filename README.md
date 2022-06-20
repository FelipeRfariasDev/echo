# ECHO - GERENCIAMENTO DE FROTAS ECOLÓGICO

![alt text](https://github.com/FelipeRfariasDev/blob/main/Database/EER/diagrama.PNG?raw=true)

Acesse o arquivo:

C:\Windows\System32\drivers\etc\hosts

127.0.0.1 echo-mvc.com.br

C:\xampp\apache\conf\extra\httpd-vhosts.conf

<VirtualHost *:80>
ServerAdmin contato@echo-mvc.com.br
DocumentRoot "C:/xampp/htdocs/echo"
ServerName echo-mvc.com.br
ServerAlias www.echo-mvc.com.br
ErrorLog "logs/dummy-host-echo-mvc.example.com-error.log"
CustomLog "logs/dummy-host-echo-mvc.example.com-access.log" common
</VirtualHost>