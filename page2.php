<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>

    <div class="homepage ">
        <main class="column-area">
            <h2>You are one stop away from your website</h2>
            <form action="createTemp.php" method="post">
                <div class="column">
                    <div class="">
                        <p>Provide general info for your Website</p>
                    </div>
                    <div class="">
                        <label for="coverImg">Cover Img Url</label>
                        <input type="text" id="coverImg" name="coverImg">
                    </div>
                    <div class="">
                        <label for="mainPageTitle">Main Title Of Page</label>
                        <input type="text" id="mainPageTitle" name="mainPageTitle">
                    </div>
                    <div class="">
                        <label for="subtitleOfPage">Subtitle Of page</label>
                        <input type="text" id="subtitleOfPage" name="subtitleOfPage">
                    </div>
                    <div class="">
                        <label for="about">Something About You</label>
                        <textarea id="about" name="about"></textarea>
                    </div>
                    <div class="">
                        <label for="telNumber">Your telephone Number</label>
                        <input type="tel" id="telNumber" name="telNumber">
                    </div>
                    <div class="">
                        <label for="Location">Location</label>
                        <input type="text" id="Location" name="Location">
                    </div>
                    <div class="">
                        <label for="services">Do you provide services or producs?</label>
                        <select id="servicesOrProducts" name="servicesOrProducts">
                            <option value="services">Services</option>
                            <option value="products">Products</option>

                        </select>
                    </div>
                </div>


                <div class="column">
                    <div class="">
                        <p>Provide url for an image anad description of your servire/product</p>
                    </div>
                    <div class="">

                        <label for="imgUrl1">Image URL</label>
                        <input type="text" id="imgUrl1" name="imgUrl1">
                    </div>
                    <div class="">
                        <label for="descService1">Description of service/product</label>
                        <input type="text" id="descService1" name="descService1">
                    </div>
                    <div class="">
                        <label for="imgUrl2">Image URL</label>
                        <input type="text" id="imgUrl2" name="imgUrl2">
                    </div>
                    <div class="">
                        <label for="descService2">Description of service/product</label>
                        <input type="text" id="descService2" name="descService2">
                    </div>
                    <div class="">
                        <label for="imgUrl3">Image URL</label>
                        <input type="text" id="imgUrl3" name="imgUrl3">
                    </div>
                    <div class="">
                        <label for="descService3">Description of service/product</label>
                        <input type="text" id="descService3" name="descService3">
                    </div>
                </div>
                <div class="column">
                    <div class="">
                        <p>Provide a description of your company, something people should be aware of before they contact you:</p>
                    </div>
                    <div class="">
                        <label for="linkedin">Linkedin:</label>
                        <input type="text" id="linkedin" name="linkedin">
                    </div>
                    <div class="">
                        <label for="facebook">facebook</label>
                        <input type="text" id="facebook" name="facebook">
                    </div>
                    <div class="">
                        <label for="twitter">Twitter:</label>
                        <input type="text" id="twitter" name="twitter">

                    </div>
                    <div class="">
                        <label for="instagram">Instagram</label>
                        <input type="text" id="instagram" name="instagram">
                    </div>
                    <input type="submit" value="Submit">
                </div>
            </form>
        </main>
    </div>

</body>

</html>