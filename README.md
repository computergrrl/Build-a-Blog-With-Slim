# Project-5 - Build a Blog With Slim

Project includes a database with two tables. A 'blog' table and a 'comments' table.

Blog entries are sorted by date (descending) on home page.  
Each entry title is a link you can click on to view the details for that blog entry.

Blog details pages are routed to the address "/details/{blog_ID}"
Blog edit pages are routed to the address "/edit/{blog_ID}"
Home page by default is "/"


Each blog entry has comments associated with it at the bottom of the page.  User can add a comment to any blog post and if they don't want to include a name then their name will automatically be assigned to "Anonymous" when comment is posted.

On the details page, you can select 'Edit entry' and be taken to a page where it's possible to
edit and update the entry.



****EASTER EGG****(silly)
For fun I included the route to the page that I used to create "mad libs" style info for
populating my database with... It's kind of a fun page and can be seen by navigating to "/pop"
