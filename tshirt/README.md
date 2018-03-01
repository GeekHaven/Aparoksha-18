## To get this registration sample running on your local machine

 - Make sure you have composer installed.
 - Then run `composer install` to install all dependency.
 - Mail sending functioanlity does not work if proxy blocks port 465.
 - So you are advised to use personal network to enable mail sending feature and use your credentials.
 - Mail sending is disabled by default if DEVELOPMENT is set to True in .env file.
 - Import apk.sql to ypur mysql.

 > Copy **.env.example** to **.env** and replace all variables with variables your are going to use.

 After successfully completing all steps, registration sample should work.
 