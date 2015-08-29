# WordPress
WordPress development

About WordPress.org
On this site you can download and install a software script called WordPress. To do this you need a web host who meets the minimum requirements and a little time. WordPress is completely customizable and can be used for almost anything. There is also a service called WordPress.com which lets you get started with a new and free WordPress-based blog in seconds, but varies in several ways and is less flexible than the WordPress you download and install yourself.



#Introduction to Plugin Development

TOPICS
Why We Make Plugins
Welcome to the Plugin Developer Handbook. Whether you’re writing your first plugin or your fiftieth, we hope this resource helps you write the best plugin possible.

The Plugin Developer Handbook covers a variety of topics — everything from what should be in the plugin header, to security best practices, to tools you can use to build your plugin. It’s also a work in progress — if you find something missing or incomplete, please edit and make it better.

There are three major components to WordPress:

core
themes
plugins
This handbook is about plugins and how they interact with WordPress. It will help you understand how they work and how to create your own.

#Why We Make Plugins #

If there’s one cardinal rule in WordPress development, it’s this: Don’t touch WordPress core. This means that you don’t edit core WordPress files to add functionality to your site. This is because, when WordPress updates to a new version, it overwrites the local files. Any functionality you want to add should be added through plugins using approved WordPress APIs.

WordPress plugins can be as simple or as complicated as you need them to be, depending on what you want to do. The simplest plugin is a single PHP file. The Hello Dolly plugin is an example of such a plugin. The plugin PHP file just needs a Plugin Header, a couple of PHP functions, and some hooks to attach your functions to.

Plugins allow you to greatly extend the functionality of WordPress without touching WordPress core itself.

 



#License

GNU GENERAL PUBLIC LICENSE

Version 3, 29 June 2007

Copyright © 2007 Free Software Foundation, Inc. <http://fsf.org/>

Everyone is permitted to copy and distribute verbatim copies of this license document, but changing it is not allowed.

Preamble
http://www.gnu.org/licenses/gpl-3.0.en.html

The GNU General Public License is a free, copyleft license for software and other kinds of works.

The licenses for most software and other practical works are designed to take away your freedom to share and change the works. By contrast, the GNU General Public License is intended to guarantee your freedom to share and change all versions of a program--to make sure it remains free software for all its users. We, the Free Software Foundation, use the GNU General Public License for most of our software; it applies also to any other work released this way by its authors. You can apply it to your programs, too.

When we speak of free software, we are referring to freedom, not price. Our General Public Licenses are designed to make sure that you have the freedom to distribute copies of free software (and charge for them if you wish), that you receive source code or can get it if you want it, that you can change the software or use pieces of it in new free programs, and that you know you can do these things.

To protect your rights, we need to prevent others from denying you these rights or asking you to surrender the rights. Therefore, you have certain responsibilities if you distribute copies of the software, or if you modify it: responsibilities to respect the freedom of others.






#Contributing
I am not looking for contributors for this project. If you have ideas, feel free to get in touch and let me know. Or if you want to suggest something, feel free to create a pull request with your ideas.

My reason for not looking for contributors is that this grid is my hobby, something I work on in my spare time and enjoy. The design is something of a passion, and I'm bringing the grid into a particular direction. To take on contributors would require overhead of organisation, as well as agreeing direction (both technical implementation and functional requirements).

If you would like to help, then please provide me with guidance and advice. I don't claim to know everything, so welcome others opinions on the direction of the project.
