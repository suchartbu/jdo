# jdo
PHP Java database objects
# Testing
java -cp /home/it/NetBeansProjects/jdo/src/jar/libraries/*:/home/it/NetBeansProjects/jdo/src/jar/models/jdb.jar execUpdate "INSERT INTO jdbc_test(id,name) VALUES('25','ทดสอบจาก Java6')" "orrcoxx" "xoylfk" "jdbc:as400://10.1.99.2/ttrpf"
java -cp /home/it/NetBeansProjects/jdo/src/jar/libraries/*:/home/it/NetBeansProjects/jdo/src/jar/models/jdb.jar execQuery "SELECT * FROM jdbc_test WHERE id > 0" "orrcoxx" "xoylfk" "jdbc:as400://10.1.99.2/ttrpf"