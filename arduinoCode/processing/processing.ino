/**************************************************************************/
/*! 
    This example will attempt to connect to an ISO14443A
    card or tag and retrieve some basic information about it
    that can be used to determine what type of card it is.   
   
    Note that you need the baud rate to be 115200 because we need to print
    out the data and read from the card at the same time!

    To enable debug message, define DEBUG in PN532/PN532_debug.h
    
*/
/**************************************************************************/


/* When the number after #if set as 1, it will be switch to SPI Mode*/
#if 0 
  #include <SPI.h>
  #include <PN532_SPI.h>
  #include "PN532.h"

  PN532_SPI pn532spi(SPI, 10);
  PN532 nfc(pn532spi);

/* When the number after #elif set as 1, it will be switch to HSU Mode*/
#elif 0
  #include <PN532_HSU.h>
  #include <PN532.h>
      
  PN532_HSU pn532hsu(Serial1);
  PN532 nfc(pn532hsu);

/* When the number after #if & #elif set as 0, it will be switch to I2C Mode*/
#else 
  #include <Wire.h>
  #include <PN532_I2C.h>
  #include <PN532.h>
  #include <NfcAdapter.h>
  
  PN532_I2C pn532i2c(Wire);
  PN532 nfc(pn532i2c);
#endif
  
void setup(void) {
  Serial.begin(115200);

  nfc.begin();

  uint32_t versiondata = nfc.getFirmwareVersion();
  if (! versiondata) {
  
    while (1); // halt
  }
  
 
  nfc.setPassiveActivationRetries(0xFF);
  
  // configure board to read RFID tags
  nfc.SAMConfig();
    
 // Serial.println("Waiting for an ISO14443A card");
}

void loop(void) {
  boolean success;
  uint8_t uid[] = { 0, 0, 0, 0, 0, 0, 0 };  // Buffer to store the returned UID
  uint8_t uidLength;                        // Length of the UID (4 or 7 bytes depending on ISO14443A card type)
  
  // Wait for an ISO14443A type cards (Mifare, etc.).  When one is found
  // 'uid' will be populated with the UID, and uidLength will indicate
  // if the uid is 4 bytes (Mifare Classic) or 7 bytes (Mifare Ultralight)
  success = nfc.readPassiveTargetID(PN532_MIFARE_ISO14443A, &uid[0], &uidLength);
  
  if (success) {
   
    for (uint8_t i=0; i < uidLength; i++) 
    {
      Serial.print(" 0x");Serial.print(uid[i], HEX); 
    }
    Serial.println("");
    // Wait 5 second before continuing
    delay(5000);
  }
  else
  {
   
   // Serial.println("Timed out waiting for a card");
  }
}
