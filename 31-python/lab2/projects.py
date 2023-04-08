import datetime
import json

def view_projects():
    with open("projects.json", "r") as f:
        projects = json.load(f)
    for project in projects:
        print(f"Title: {project['title']}")
        print(f"Details: {project['details']}")
        print(f"Total target: {project['total_target']}")
        print(f"Start time: {project['start_time']}")
        print(f"End time: {project['end_time']}")
        print(f"User: {project['user']['email']}")
        print(f"Current amount: {project['current_amount']}")
        print("-------------------")

def create_project(user):
    while True:
        title = input("Title: ")
        details = input("Details: ")
        try:
            total_target = int(input("Total target: "))
        except ValueError:
            print("Error: Invalid input. Total target must be an integer.")
            continue
        start_time_str = input("Start time (YYYY-MM-DD HH:MM:SS): ")
        try:
            start_time = datetime.datetime.strptime(start_time_str, "%Y-%m-%d %H:%M:%S")
        except ValueError:
            print("Error: Invalid input. Start time must be in the format YYYY-MM-DD HH:MM:SS.")
            continue
        end_time_str = input("End time (YYYY-MM-DD HH:MM:SS): ")
        try:
            end_time = datetime.datetime.strptime(end_time_str, "%Y-%m-%d %H:%M:%S")
        except ValueError:
            print("Error: Invalid input. End time must be in the format YYYY-MM-DD HH:MM:SS.")
            continue

        with open("projects.json", "r") as f:
            projects = json.load(f)
        if projects:
            project_id = max(p["id"] for p in projects) + 1
        else:
            project_id = 1
        project = { "id": project_id,"title": title, "details": details, "total_target": total_target, "start_time": start_time.isoformat(), "end_time": end_time.isoformat(), "user": user, "current_amount": 0}

        projects.append(project)
        with open("projects.json", "w") as f:
            json.dump(projects, f)
        print("Project created successfully.")
        break

def edit_project(project_id, user):
    title = input("Title: ")
    details = input("Details: ")
    total_target = int(input("Total target: "))
    start_time_str = input("Start time (YYYY-MM-DD HH:MM:SS): ")
    start_time = datetime.datetime.strptime(start_time_str, "%Y-%m-%d %H:%M:%S")
    end_time_str = input("End time (YYYY-MM-DD HH:MM:SS): ")
    end_time = datetime.datetime.strptime(end_time_str, "%Y-%m-%d %H:%M:%S")
    with open("projects.json", "r") as f:
        projects = json.load(f)
    if not projects[project_id-1]:
        print("Error: Project not found.")
        return
    else:
        project = projects[project_id-1]

    if project["user"] != user:
        print("Error: You cannot edit projects created by other users.")
        return
    if title:
        project["title"] = title
    if details:
        project["details"] = details
    if total_target:
        project["total_target"] = total_target
    if start_time:
        project["start_time"] = start_time.isoformat()
    if end_time:
        project["end_time"] = end_time.isoformat()
    with open("projects.json", "w") as f:
        json.dump(projects, f)
    print("Project edited successfully.")


def delete_project(project_id, user):

    with open("projects.json", "r") as f:
        projects = json.load(f)
    if not projects[project_id - 1]:
        print("Error: Project not found.")
        return
    else:
        project = projects[project_id - 1]

    if project["user"] != user:
        print("Error: You cannot delete projects created by other users.")
        return
    projects.remove(project)
    with open("projects.json", "w") as f:
        json.dump(projects, f)
    print("Project deleted successfully.")



def search_projects(date):
    # Load projects
    with open("projects.json", "r") as f:
        projects = json.load(f)

    # Parse search date
    date_format = "%Y-%m-%dT%H:%M:%S"
    try:
        search_date = datetime.datetime.strptime(date, date_format)
    except ValueError:
        print("Error: Invalid date format. Please enter dates in YYYY-MM-DD format.")
        return

    # Search for projects
    results = []
    for project in projects:
        start_date = datetime.datetime.strptime(project["start_time"], date_format)
        end_date = datetime.datetime.strptime(project["end_time"], date_format)
        if search_date >= start_date and search_date <= end_date:
            results.append(project)

    # Print results
    if results:
        print("Search results:")
        for project in results:
            print(f"{project['title']}: {project['details']}")
    else:
        print("No projects found.")