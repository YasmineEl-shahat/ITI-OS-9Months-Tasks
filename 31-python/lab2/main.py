from register import register
from login import login
from activate_user import activate_user
from projects import create_project, view_projects, search_projects, edit_project,delete_project

def mainmenu():
    print("welcom to crow funding app")
    choice = input("for register choose r for login choose l, for activate a :")

    if choice == 'l':
        user = login()
        if user:
            print(f"welcome, {user['first_name']} {user['last_name']}")
            choice = input ("create new project choose c, view use v, e edit, d delete, s search:")
            if choice == 'c':
                create_project(user)
            elif choice == 'v':
                view_projects()
            elif choice == 's':
                date = input('enter date of project')
                search_projects(date)
            elif choice == 'e':
                project_id = int(input("enter project id"))
                edit_project(project_id, user)
            elif choice == 'd':
                project_id = int(input("enter project id"))
                delete_project(project_id, user)

    elif choice =='r':
        register()
    elif choice == 'a':
        activate_user()

mainmenu()
