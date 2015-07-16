class Solution {

  public:

       int findPeakElement(vector<int>& nums) {
       int s=nums.size();

       if(s==0)

        return -1;
       if(s==1)

         return 0;
     if(s==2)

    {

         if(nums[0]>=nums[1])                                                                            return 0;

         else
                                                                                        return 1;                                                                                      }
     if(nums[0]>=nums[1])

           return 0;

     if(nums[s-1]>=nums[s-2])

          return (s-1);

       for(int i=1;i<s-1;i++)

                                                                            {

                                                                                          if(nums[i]>=nums[i+1])
                                                                                           return i;
 }
            return 1;

                                                                              }

};
