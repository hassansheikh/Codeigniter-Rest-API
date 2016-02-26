# careaxiom
Rest api

unzip the ci.rar first

Import tha codeigniter file from project root
codeigniter.sql


Search (SET rest method  GET)

Guest
http://localhost/ci/index.php/airport_rest/search?airport_code=123&city=lhr
Admin/User
http://localhost/ci/index.php/airport_rest/search?airport_code=123&city=lhr&key=123456789


Get record (SET rest method  GET)
Admin/User
Json response
http://localhost/ci/index.php/airport_rest/airport?id=2&key=123456789
Html response
http://localhost/ci/index.php/airport_rest/airport/format/html?id=2&key=123456789
xml response
http://localhost/ci/index.php/airport_rest/airport/format/xml?id=2&key=123456789




Add record (SET rest method  POST)

form data 
airport_code=15632&airport_name=AIQ&country=pk&city=isb&key=123456789

Json response
http://localhost/ci/index.php/airport_rest/airport

xml response
http://localhost/ci/index.php/airport_rest/airport/format/xml

xml response
http://localhost/ci/index.php/airport_rest/airport/format/html




Edit Record (SET REST method PUT)
Only admin can update. Admin determine by its auth key

form data 
airport_code=15632&airport_name=AIQ&country=pk&city=isb&key=123456789&id=1

Json response
http://localhost/ci/index.php/airport_rest/airport

xml response
http://localhost/ci/index.php/airport_rest/airport/format/xml

xml response
http://localhost/ci/index.php/airport_rest/airport/format/html


Delete Record (SET REST method DELETE)
Only admin can update. Admin determine by its auth key

Json response
http://localhost/ci/index.php/airport_rest/airport

form data
key=123456789&id=2



