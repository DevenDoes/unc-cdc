import mysql.connector
import pandas as pd
import numpy as np

rawData = pd.read_csv('./typeform.csv')

email_col = 3
country_col = 4
state_col = 5
add_street_col = 6
add_city_col = 7
add_zip_col = 8
school_col = 9
school_other_col = 10
school_level_col = 11
graduation_year_col = 13
shirt_size_col = 16
gender_col = 17
primary_major_col = 27
secondary_major_col = 29
minor_col = 31

filteredData = rawData.iloc[:,
               [
                   email_col,
                   country_col,
                   state_col,
                   add_street_col,
                   add_city_col,
                   add_zip_col,
                   school_col,
                   school_other_col,
                   school_level_col,
                   graduation_year_col,
                   shirt_size_col,
                   gender_col,
                   primary_major_col,
                   secondary_major_col,
                   minor_col
               ]]

processedData = pd.DataFrame(columns=[
    'email',
    'gender',
    'country',
    'state',
    'prize_consent',
    'shirt_size',
    'address_country',
    'address_state',
    'address_street',
    'address_city',
    'address_zip',
    'school',
    'school_level',
    'primary_major',
    'secondary_major',
    'minor',
    'graduation_year',
])

for index, row in filteredData.iterrows():

    prizeConsent = False
    if len(str(row[3])) > 0 or len(str(row[4])) > 0 or len(str(row[5])) > 0:
        prizeConsent = True

    school = str(row[6])
    if school == "Other":
        school = row[7]

    zip = str(row[5])
    if(len(zip) != 5):
        zip = None

    country = row[1]
    if country == "United States of America":
        country = "United States"

    tempDf = pd.DataFrame([[
        row[0],  # email
        row[11],  # gender
        country,  # country
        row[2],  # state
        prizeConsent,  # prize_consent
        row[10],  # shirt_size
        country,  # address_country
        row[2],  # address_state
        row[3],  # address_street
        row[4],  # address_city
        zip,  # address_zip
        school,  # school
        row[8],  # school_level
        row[12],  # primary_major
        row[13],  # secondary_major
        row[14],  # minor
        row[9],  # graduation_year
    ]], columns=[
        'email',
        'gender',
        'country',
        'state',
        'prize_consent',
        'shirt_size',
        'address_country',
        'address_state',
        'address_street',
        'address_city',
        'address_zip',
        'school',
        'school_level',
        'primary_major',
        'secondary_major',
        'minor',
        'graduation_year',
    ])

    processedData = pd.concat([processedData, tempDf], ignore_index=True)

#print(processedData)

processedData = processedData.where(pd.notnull(processedData), None)

db = mysql.connector.connect(
    host="localhost",
    user="homestead",
    password="secret",
    database="homestead"
)

cursor = db.cursor()

for index, row in processedData.iterrows():

    sql = """
    INSERT INTO
        typeform (email, gender, country, state, prize_consent, shirt_size, address_country, address_state, address_street, address_city, address_zip, school, school_level, primary_major, secondary_major, minor, graduation_year)
        VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"""

    val = (row[0], row[1], row[2], row[3], row[4], row[5], row[6], row[7], row[8], row[9], row[10], row[11], row[12], row[13], row[14], row[15], row[16])

    print(val)

    try:
        cursor.execute(sql, val)
    except:
        print('ERROR')


db.commit()

print(cursor.rowcount, "records inserted.")


