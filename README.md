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

Copyright 2013 City Index Ltd.

Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.
