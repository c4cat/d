import csv

csvfile = file('csv_test.csv','wb')

write = csv.writer(csvfile)
write.writerow(['post_id', 'post_name', 'post_author', 'post_date', 'post_type', 'post_status', 'post_title', 'post_content', 'post_category', 'post_tags', 'custom_field', 'post_thumbnail'])
data=[
('', 'Import-test', 'admin', '2013-9-13 0:00', 'project', 'publish', 'CSV Import Test', 'This is a post for csv import.\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'fruits', 'apple,banana', 'this is custom field value.', 'http://su.bdimg.com/static/superpage/img/logo_white.png')
]
write.writerows(data)
csvfile.close()