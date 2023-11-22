from carts_faker import *
from categories_faker import *
from products_faker import *
from user_faker import *

# Constant
USER_COUNT = 10
PRODUCTS_COUNT = 100
CATEGORIES_COUNT = 10
PRICE_LOW = 1
PRICE_HIGH = 1000
STOCK_LIMIT = 100
CARTS_COUNT = 300

# Seeding
print("Seeding User Data Begin")
user_faker(USER_COUNT)
print("Seeding User Data Finished")
print()

print("Seeding Category Data Begin")
categories_faker(CATEGORIES_COUNT)
print("Seeding Category Data Finished")
print()

print("Seeding Product Data Begin")
products_faker(PRODUCTS_COUNT, CATEGORIES_COUNT, PRICE_LOW, PRICE_HIGH, STOCK_LIMIT)
print("Seeding Product Data Finished")
print()

print("Seeding Cart Data Begin")
carts_faker(CARTS_COUNT, USER_COUNT, PRODUCTS_COUNT)
print("Seeding Cart Data Finished")
print()
