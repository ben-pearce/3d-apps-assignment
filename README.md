
## Web 3D Applications Assignment

This application was built to demonstrate how x3dom can be used to embed interactive 3D models into a MVC style web application with a back-end in PHP. 
Content is loaded from the back-end in the form of a JSON packet which contains the page content that is then displayed to the user.

Below are additional resources which were used or produced during the creation of this application.

### Related Links

- [GitHub Repository](https://github.com/ketnipz/3d-apps-assignment)
- [3D Models Download (x3d)](https://github.com/ketnipz/3d-apps-assignment/blob/main/models.zip) (.zip)
- [3DS Max Model Archives Download](https://github.com/ketnipz/3d-apps-assignment/blob/main/archives.zip) (.zip)

### Screenshots

![Screenshot](https://user-images.githubusercontent.com/32749673/112722071-488df680-8eff-11eb-8c50-b09adccc3518.png)

![Screenshot](https://user-images.githubusercontent.com/32749673/112722079-52aff500-8eff-11eb-90df-076cb4ce0592.png)

### Going Beyond Mark Scheme Requirements

A few elements have been implemented into this application which are not essential requirements of the markscheme, they are highlighted below.

- Use of **prepared PDO statements** and **PDO parameter binding** for submitting SQL statements against the data store. 
  In production this would be hugely important in securing the application against SQL injection vulnerabilities.
- Instead of utilising jQuery show/hide functions to switch pages, **AJAX requests** are submitted to the backend and content  is loaded in this way when the user requests it. In production  this would be considerably more efficient in terms of saving  bandwidth since only  the page the user wants to visit is loaded from the back-end.
  It also means that only one 3D model is being rendered by the browser at any given time, resulting in much less resource consumption on the client.
- **CSS variables** have been used to create two completely different color themes for the page styling. JavaScript then applies the appropriate data attribute to activate the two different themes.
  Two themes are available and can be switched between using the button in the footer.
- Support in the API for **CRUD** (**C**reate, **R**ead, **U**pdate, **D**elete). There are several endpoints in the API which support additional functionality for actions which can be taken against the data store. 
  They are as follows:
  - `/dbInstall` - Creates tables and populates records.
  - `/dbCreateModel` - Create a new 3D model record.
  - `/dbDeleteModel` - Delete a 3D model record.
  - `/dbCreateBrand` - Create a new brand record.
  - `/dbDeleteBrand` - Delete a brand record.
  - `/dbCreateString` - Creates or updates an existing string value.
  - `/dbDeleteString` - Deletes a string record.
  - `/dbCreateTexture` - Creates a new texture record.
  - `/dbDeleteTexture` - Deletes a texture record.
- An advanced renderer (**Arnold**) has been used to render photorealistic images of each model (the last two renderings in each image gallery).
- Some brands support a texture panel (accessible via the "Flavours" drop-down above the 3D model). This allows user to apply a new texture to the model dynamically after it has been loaded.

### References

- jQuery AJAX https://api.jquery.com/jquery.ajax/ [accessed: 23.03.21]
- jQuery JSON https://api.jquery.com/jquery.getjson/ [accessed: 23.03.21]
- fancyBox https://github.com/fancyapps/fancybox [accessed: 25.03.21]
- PDO::query https://www.php.net/manual/en/pdo.query.php [accessed: 26.03.21]
- PDO::prepare https://www.php.net/manual/en/pdo.prepare.php [accessed: 26.03.21]
- PDOStatement::bindparam https://www.php.net/manual/en/pdostatement.bindparam.php [accessed: 26.03.21]
- PDOStatement::fetchAll https://www.php.net/manual/en/pdostatement.fetchall.php [accessed: 26.03.21]
- x3dom https://doc.x3dom.org/tutorials/index.html [accessed: 26.03.21]
- Bootstrap 5.0 https://getbootstrap.com/docs/5.0/components [accessed: 26.03.21]
- Creating dark/light theme support https://dev.to/ananyaneogi/create-a-dark-light-mode-switch-with-css-variables-34l8 [accessed: 25.03.21]

### Statement of Originality
These web pages are submitted as part requirement for the degree of  Computer Science & Artificial Intelligence at the University of Sussex.
They are the product of my own labour except where indicated in the web page content. 

These web pages or contents may be freely copied and distributed provided the source is acknowledged.