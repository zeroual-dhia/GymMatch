<form id="forming" action="/GymPath/www/includes/AddProduct.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="productImage" class="form-label">Select a picture of the product</label>
                                <input id="productImage" class="form-control bg-dark" type="file" name="imaga"  required>
                            </div>
                            <div class="mb-3">
                                <label for="productName" class="form-label">Product name</label>
                                <input id="productName" type="text" class="form-control" name="pname" id="exampleInputPassword1" required>
                            </div>
                            <div class="mb-3">
                                <label for="productQuantity"  class="form-label">product quantity</label>
                                <input id="productQuantity" type="text" class="form-control" name="quantity" id="exampleInputPassword1" required>
                            </div>
                            <div class="mb-3">
                            <select name="type" class="form-select productSize" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected>Open the menu</option>
                                    
                                    <option value="Supplements & Nutrition">Supplements & Nutrition</option>
                                    <option value="Activewear & Footwear">Activewear & Footwear</option>
                                    <option value="Gym Equipment & Accessories">Gym Equipment & Accessories</option>
                                    
                                    
                                    

                                    

                                </select>
                                <label for="productType" class="form-label">Product type </label>
                                
                            </div>
                            <div class="form-floating mb-3">
                                <select name="size" class="form-select productSize" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected>Open the menu</option>
                                    
                                    <option value="36">36</option>
                                    <option value="38">38</option>
                                    <option value="34">40</option>
                                    <option value="42">42</option>
                                    
                                    

                                    

                                </select>
                                <label for="floatingSelect" >size</label>
                            </div>
                            <div class="mb-3">
                                <label for="productPrice" class="form-label">Product price </label>
                                <input id="productPrice" type="text" class="form-control" name="price" id="exampleInputPassword1" required>
                            </div>
                            <button  type="submit" class="btn btn-primary">Add</button>
                            </form>