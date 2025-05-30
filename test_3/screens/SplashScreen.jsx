import React, {useEffect} from 'react';
import {View, Text, ActivityIndicator, Image} from 'react-native';

const SplashScreen = ({navigation}) => {
  useEffect(() => {
    setTimeout(() => {
      navigation.replace('Login');
    }, 3000);
  }, [navigation]);

  return (
    <View
      style={{
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
        backgroundColor: '#d2ebe5',
      }}>
      <Image
        source={require('../assets/logo-ardata.png')}
        style={{margin: 20, width: 350, height: 100, alignSelf: 'center'}}
      />
    </View>
  );
};

export default SplashScreen;
