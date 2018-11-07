<!DOCTYPE html>
<html>
    <head>
        <title>Add Products</title>
        <meta charset="utf-8">
    </head>
    <body>
        <form>
           Product name: <input type="text" name="productName"><br>
           Description: <textarea name="description" cols="50" rows="4"></textarea><br>
           Price: <input type="text" name="price"><br>
           Category: 
           <select name="catId">
              <option value="">Select One</option>
           </select> <br />
           Set Image Url: <input type="text" name="productImage"><br>
           <input type="submit" name="submitProduct" value="Add Product">
        </form>
    </body>
</html>