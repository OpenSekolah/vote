import{_ as p}from"./AppLayout-5a73a20b.js";import c from"./DeleteUserForm-e04321f4.js";import l from"./LogoutOtherBrowserSessionsForm-444c7eac.js";import{S as s}from"./SectionBorder-25d69b19.js";import f from"./TwoFactorAuthenticationForm-e270a54b.js";import u from"./UpdatePasswordForm-ca6d074e.js";import _ from"./UpdateProfileInformationForm-76a3f6e0.js";import{o as e,c as d,w as n,a as i,e as r,b as t,f as a,F as h}from"./app-470e78aa.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./ActionSection-0d8135f7.js";import"./SectionTitle-a6d2ebaa.js";import"./DangerButton-9c0b1e48.js";import"./DialogModal-0ae1111e.js";import"./InputError-b7390d0b.js";import"./SecondaryButton-93c9f12f.js";import"./TextInput-e6b309d2.js";import"./ActionMessage-3bfea874.js";import"./PrimaryButton-f3d723bc.js";import"./InputLabel-2500ee2e.js";import"./FormSection-ac47b6b7.js";const g=i("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Profile ",-1),$={class:"max-w-full mx-auto py-10 sm:px-6 lg:px-8"},w={key:0},k={key:1},y={key:2},H={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array},setup(m){return(o,B)=>(e(),d(p,{title:"Profile"},{header:n(()=>[g]),default:n(()=>[i("div",null,[i("div",$,[o.$page.props.jetstream.canUpdateProfileInformation?(e(),r("div",w,[t(_,{user:o.$page.props.auth.user},null,8,["user"]),t(s)])):a("",!0),o.$page.props.jetstream.canUpdatePassword?(e(),r("div",k,[t(u,{class:"mt-10 sm:mt-0"}),t(s)])):a("",!0),o.$page.props.jetstream.canManageTwoFactorAuthentication?(e(),r("div",y,[t(f,{"requires-confirmation":m.confirmsTwoFactorAuthentication,class:"mt-10 sm:mt-0"},null,8,["requires-confirmation"]),t(s)])):a("",!0),t(l,{sessions:m.sessions,class:"mt-10 sm:mt-0"},null,8,["sessions"]),o.$page.props.jetstream.hasAccountDeletionFeatures?(e(),r(h,{key:3},[t(s),t(c,{class:"mt-10 sm:mt-0"})],64)):a("",!0)])])]),_:1}))}};export{H as default};
