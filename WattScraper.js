//****IMPORTANT****
//Disclaimer: This scraping code uses MY personal stories written on wattpad, of which I am giving express permission. Altering this code to other URL(s) may warrant a C&D from
//Wattpad. Use at your own discretion in this manner.

const fs = require('fs'); //Initializes for use in index.php

const axios = require('axios');
const cheerio = require('cheerio');
//These libraries will be what I use to scrape the content I need from my WattPad

const wattpadUrl = 'https://www.wattpad.com/1024114527-lines-and-his-name-was-chernobog';

// Function to scrape the titles
async function scrapeTitle() {
  try {
    const response = await axios.get(wattpadUrl);
    const $ = cheerio.load(response.data);

    // Find the element with class "h2" and extract the title
    const title = $('h1.h2').text().trim();

    // Save the title to a JSON file
    fs.writeFile('title.json', JSON.stringify(title), 'utf8', (err) => {
      if (err) {
        console.error('Error writing JSON file:', err);
      } else {
        console.log('Title successfully saved to title.json');
      }
    });
  } catch (error) {
    console.error('Error:', error);
  }
}

// Function to scrape the lines
async function scrapeLines() {
  try {
    const response = await axios.get(wattpadUrl);
    const $ = cheerio.load(response.data);

    // Find all <p> elements with a "data-p-id" attribute
    const lines = [];
    $('p[data-p-id]').each((index, element) => {
      const line = $(element).text().trim();
      lines.push(line);
    });

    // Convert the lines array to JSON and write it to a file
    fs.writeFile('lines.json', JSON.stringify(lines), 'utf8', (err) => {
      if (err) {
        console.error('Error writing JSON file:', err);
      } else {
        console.log('Lines successfully saved to lines.json');
      }
    });
  } catch (error) {
    console.error('Error:', error);
  }
}

// Call the functions to start scraping
scrapeTitle();
scrapeLines();
