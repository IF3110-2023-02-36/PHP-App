from template_faker import *

def user_faker(USER_COUNT : int):
    for i in range(USER_COUNT):
        user_sql = '''INSERT INTO users(email, username, name, password, description, category) 
                    VALUES(%s, %s, %s, %s, %s, %s)'''
                
        name = faker.name()
        username = name + "-" + str(i)
        email = username + "@gmail.com"
        password = name
        description = faker.text()
        category = "user"
        
        user_val = (email, username, name, password, description, category)

        cursor.execute(user_sql, user_val)
        
    db.commit()
    print("Insertion success")
    
if __name__ == "__main__":
    USER_COUNT = 1000
    user_faker(USER_COUNT)