from selenium import webdriver
from selenium.webdriver import ActionChains
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select

# create a new Chrome browser instance
driver = webdriver.Chrome()

# navigate to the sample website
driver.get("https://artoftesting.com/sampleSiteForSelenium")

# find 5 different elements

checkbox_element = driver.find_element(By.ID, "female")
select_element = Select(driver.find_element(By.ID, "testingDropdown"))
text_box = driver.find_element(By.NAME, "firstName")
button = driver.find_element(By.ID, "dblClkBtn")
link_element = driver.find_element(By.LINK_TEXT, "Selenium Sample Script")

# interact with the elements

checkbox_element.click()
select_element.select_by_visible_text("Manual Testing")
text_box.send_keys("Yasmine")
action = ActionChains(driver)
action.double_click(button)
# navigate to another page
link_element.click()

# print page title of new page
print(driver.title)

# go back to previous page and print page title
driver.back()
print(driver.title)

# close the window
driver.quit()