# imports
from faker import Faker
from random import randint
import mysql.connector
import os
from os.path import abspath, dirname, splitext

# database
db = mysql.connector.connect(
    host="localhost",
    port=3307,
    user="root",
    password="rootpw",
    database="tubes-db",
)
cursor = db.cursor()

# faker
faker = Faker()

# os path
file_path = abspath(__file__)
root_path = dirname(dirname(file_path))

# functions
def clear_table(table_name : str):
    delete_sql = "DELETE FROM " + table_name
    cursor.execute(delete_sql)
    db.commit()
    print("Deletion success")

def clear_database():
    clear_table("carts")
    clear_table("product_files")
    clear_table("products")
    clear_table("categories")
    clear_table("users")