#!c:\Python\python.exe
print("Content-Type: text/html \n\n")
# import pandas as pd
import cgi
import os
import cgitb; cgitb.enable()




print("<!DOCTYPE html><html lang=\"en\"><head><meta charset=\"UTF-8\">"
      "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">"
      "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">"
      "<meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\"> <!-- edge compatible -->"
      "<link rel=\"stylesheet\" class=\"card-link\" href=\"css/bootstrap.css\">"
      "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css\">"
      "<script src=\"script/jquery-3.2.1.js\"></script>"
      "<script src=\"script/tether.js\"></script>"
      "<script src=\"script/bootstrap.js\"></script>"
      "<script type=\"text/javascript\" src=\"script/javascript.js\"></script>"
      "<title>XYZ Company - Create your own Group!</title>"
      "</head>"
      "<body>")

print("<div class=\"container\">")
print("""<div class=\"jumbotron bg-success\">
            <h1 class=\"text-center\">Submit your own group</h1>
                <div>
                    <a href="index.php">Return to the Previous Page</p></a>
                </div>
         </div>""")

print("""<div class=\"row\">
            <div class=\"jumbotron bg-info col-4\">
                <form method=\"post\" action=\"\">
                    <div class=\"text-left\">
                        <div class=\"mb-3\">
                            <label for=\"fileupload\"> Select a file to upload</label>
                            <input type=\"file\" name=\"fileupload\" value=\"fileupload\" id=\"fileupload\"> 
                        </div> 
                   
                        <div class=\"mb-3\">
                            <label for=\"groupSize\"><b>Group Size:</b></label>
                            <input type=\"number\" name=\"groupSize\" id=\"groupSize\" min=\"1\" max=\"99\">                   
                        </div>
                
                        <div class=\"mb-3\">
                            <button class=\"btn btn-success\" type=\"submit\" value=\"submit\" name=\"submit\">Create Groups</button>                
                        </div>       
                    </div>
                </form>            
            </div>""")

form = cgi.FieldStorage()
message = ""
content = ""
names = []
interests = []
dates = []

# empty groups
groups = []

# Sets that will be used to create all the possible groups
interestsUnique = set()
datesUnique = set()

# dictionary that will hold all the possible groups!
allGroups = dict()


# get the groupSize from the form
groupSize = form.getvalue('groupSize')
# groupSize = int(groupSize)


# if groupSize is defined (must be bigger than 0, the website ensure that)
# then read the file and create the groups
if groupSize is not None:
    try:
        fileitem = form.getvalue('fileupload')
        groupSize = int(groupSize)
    except NameError:
        fileitem = None
    #
    # # if fileitem is None:
    #     message = "No file Uploaded"

    if fileitem is not None:
        fn = os.path.basename(fileitem)
        file = open(fn, 'r')
        message = 'The file "' + fn + '"was uploaded successfully'
        content = file.read().splitlines()
        for line in content:

            names.append(line.split(';')[0])
            interests.append(line.split(';')[1])
            dates.append(line.split(';')[2])

            # Creating sets to have unique values and create possible groups based on these values
            interestsUnique.add(line.split(';')[1])
            datesUnique.add(line.split(';')[2])
            # empty groups for now
            groups.append("Not Assigned")

        # Fill up the allGroups dictionary using the key as interest + date (one string)
        for interest in interestsUnique:
            for date in datesUnique:
                key = interest + date
                allGroups[key] = []

        # number of people added using the file
        numOfPeople = len(names)

        # looping for interests and dates lists and using their value (for each x) as a key
        # for the dictionary allGroups and appending the value of x,
        # which is the person that is interested in that place/date
        for x in range(0, numOfPeople):
            key = interests[x] + dates[x]
            allGroups[key].append(x)

        # Initialize the groupID as = 1
        groupID = 1

        # Iterate through the allGroups dictionary to search for a list inside it that is equal or bigger than
        # the groupSize

        for key, value in allGroups.items():
            if len(value) >= groupSize:
                numberOfGroups = len(value) // groupSize
                # floor division, so only complete groups with the groupSize will be created
                for x in range(0, numberOfGroups * groupSize):
                    if x > groupSize:
                        # update the groupID because it means that the loop has iterate
                        # through more than one groupSize
                        groupID += 1
                    # Store into the groups list using the index stored inside each
                    # list (value) in the allGroups dictionary
                    groups[value[x]] = groupID

                # update the groupID after the loop was executed
                groupID += 1
        message = ""

        print("""<div class=\"jumbotron bg-secondary col-8\">        
                        <div class=\"text-left\">
                            <table class=\"table table-striped table-hover\">
                            <thead class=\"thead-dark\">
                            <tr>
                                <th scope=\"col\">#</th>
                                <th scope=\"col\">Name</th>
                                <th scope=\"col\">Interest</th>
                                <th scope=\"col\">Date</th>
                                <th scope=\"col\">Group</th>
                            <tr>
                            </thead>
                            """)
        for x in range(0,len(names)):
            print("<tr>")
            print("<th scope=\"row\">",x + 1,"</th>")
            print("<td>", names[x], "</td>")
            print("<td>", interests[x], "</td>")
            print("<td>", dates[x], "</td>")
            print("<td>", groups[x], "</td>")
            print("</tr>")
        print("""       </div>            
                    </div>
                </div>""")
