from template_faker import *

# Constant
PRODUCTS_COUNT = 10000
CATEGORIES_LIMIT = 20
PRICE_LOW = 1
PRICE_HIGH = 1000
STOCK_LIMIT = 100

# Get data from folder
image_path = root_path + "\\src\\storage\\image\\"
images = os.listdir(image_path)
image_count = len(images)

# Get data from database
select_categories = '''SELECT id 
                        FROM categories
                        ORDER BY rand()
                        LIMIT ''' + str(CATEGORIES_LIMIT)
cursor.execute(select_categories)
categories = cursor.fetchall()

print("Data retrieval success")

for i in range(PRODUCTS_COUNT):
    product_sql = '''INSERT INTO products(category_id, name, description, price, stock) 
                    VALUES(%s, %s, %s, %s, %s)'''

    category_index = randint(0, CATEGORIES_LIMIT - 1)
    category_id = categories[category_index][0]
    name = faker.name() + "-" + str(i)
    description = faker.text()
    price = randint(PRICE_LOW, PRICE_HIGH)
    stock = randint(0, STOCK_LIMIT)
    
    product_val = (category_id, name, description, price, stock)

    cursor.execute(product_sql, product_val)
    product_id = cursor.lastrowid
    
    file_sql = '''INSERT INTO product_files(product_id, file_name, file_extension)
                VALUES(%s, %s, %s)'''
    
    image_index = randint(0, image_count - 1)
    file_name = images[image_index]
    file_extension = splitext(file_name)[1]
    file_val = (product_id, file_name, file_extension)
    
    cursor.execute(file_sql, file_val)
    
db.commit()
print("Insertion success")
