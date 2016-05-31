# PDO

PHP Data Objects is a good way to connect and access your database.
Here goes a simple PDO project for beginners, as well as a easy way to learn CRUD with this basic structure.

The main objective here, is not showing how is the best way to connect you database. The idea behind it is just to help new people in their PDO studies.
As you can realize, there are no design partterns or frameworks implemented here. I hope this helps in your learning.

## Database Structure

```go
--
-- Database: `test`
--

CREATE SCHEMA IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8 ;
USE `test` ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
```