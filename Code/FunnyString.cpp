//Funny String.... 
//https://www.hackerrank.com/challenges/funny-string
//https://www.hackerrank.com/iqbalcoeus
#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
using namespace std;


int main() {
    /* Enter your code here. Read input from STDIN. Print output to STDOUT */  
    char str[10000];
    int nt=0;
    cin>>nt;
    while(nt>=0)
    {
    cin.getline(str,10000);
        int len=0;
        for(int i=0;str[i]!='\0';i++)
            len++;
        if(len!=0)
            {
        int a=len-1;
        int n1=0;int n2=0;
        int f=1;
        for(int i=0;i<len-1;i++)
            {
            n1=abs((int)str[i+1]-(int)str[i]);
            n2=abs((int)str[a]-(int)str[a-1]);
            a--;
            if(n1!=n2)
                {
                f=0;
                cout<<"Not Funny"<<endl;
                break;
            }
           
            
        }
        if(f==1)
            cout<<"Funny"<<endl;
        
            
        }
        nt--;
    }
    return 0;
}

