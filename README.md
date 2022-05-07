# eds-helper
Pet project for learning purposes and for helping with filling in tax declarations.

I'm storing info about received dividends in database. When filling in declaration, I have to find exchange rate on Bank.lv for every transaction which happened in foreign currency on given date and calculate it to local currency (EUR). It's time-consuming and annoying, that's why I decided to make this tool. <br>
It gets data about received dividends from database and searches currency exchange rates automatically based on stored information in database. </br>
</br>
I'm using database table like this: </br> </br>
Table "dividend"

| Column   | DataType   | Constraints |
|----------|------------|-------------|
| id       | int        | PK NN UQ AI |
| ticker   | varchar(5) | NN          |
| date     | date       | NN          |
| dividend | float      | NN          |
| tax      | float      |             |
| received | float      | NN          |
| currency | varchar(3) | NN          |


