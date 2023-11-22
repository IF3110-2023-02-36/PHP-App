from template_faker import *

def categories_faker(CATEGORIES_COUNT : int):
    for i in range(CATEGORIES_COUNT):
        category_sql = '''INSERT INTO categories(name) 
                        VALUES(%s)'''

        category_name = "category-" + str(i + 1)
        
        category_val = (category_name,)

        cursor.execute(category_sql, category_val)
        
    db.commit()
    print("Insertion success")
    
if __name__ == "__main__":
    CATEGORIES_COUNT = 10000
    categories_faker(CATEGORIES_COUNT)
    