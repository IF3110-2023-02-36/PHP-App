from template_faker import *

# Constant
CARTS_COUNT = 10000
USERS_LIMIT = 200
PRODUCTS_LIMIT = 200

# Get data from database
select_users = '''SELECT id 
                    FROM users
                    ORDER BY rand()
                    LIMIT ''' + str(USERS_LIMIT)
cursor.execute(select_users)
users = cursor.fetchall()

select_products = '''SELECT id, stock
                    FROM products
                    ORDER BY rand()
                    LIMIT ''' + str(PRODUCTS_LIMIT)
cursor.execute(select_products)
products = cursor.fetchall()

select_carts = '''SELECT user_id, product_id
                    FROM carts'''
cursor.execute(select_carts)
existing_carts = cursor.fetchall()

for i in range(CARTS_COUNT):
    carts_sql = '''INSERT INTO carts(user_id, product_id, quantity) 
                    VALUES(%s, %s, %s)'''

    user_index = randint(0, USERS_LIMIT - 1)
    product_index = randint(0, PRODUCTS_LIMIT - 1)
    while((users[user_index][0], products[product_index][0]) in existing_carts) :
        user_id = randint(0, USERS_LIMIT - 1)
        product_id = randint(0, PRODUCTS_LIMIT - 1)

    user_id = users[user_index][0]
    product_id = products[product_index][0]
    quantity = randint(1, products[product_index][1])

    carts_val = (user_id, product_id, quantity)

    cursor.execute(carts_sql, carts_val)
    
db.commit()
print("Insertion success")