<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
define('SRC_PATH', APPPATH.'/third_party/Adwords/src/');
define('LIB_PATH', 'Google/Api/Ads/AdWords/Lib');
define('UTIL_PATH', 'Google/Api/Ads/Common/Util');
define('AW_UTIL_PATH', 'Google/Api/Ads/AdWords/Util');

define('ADWORDS_VERSION', 'v201306');

// Configure include path
ini_set('include_path', implode(array(
    ini_get('include_path'), PATH_SEPARATOR, SRC_PATH))
    );

// Include the AdWordsUser file
require_once SRC_PATH.LIB_PATH. '/AdWordsUser.php';

class Adwords extends AdWordsUser { 

  public function __construct() { 
    parent::__construct();
  }       

function GetCampaign() {
  // Get the service, which loads the required classes.
  $campaignService = $this->GetService('CampaignService', ADWORDS_VERSION);

  // Create selector.
  $selector = new Selector();
  $selector->fields =
      array('Id', 'Name', 'Status', 'ServingStatus', 'StartDate', 'EndDate', 'Clicks', 
        'Impressions', 'Cost', 'Ctr', 'AverageCpc', 'AverageCpm', 'TotalBudget');
  // Set date range to request stats for.
  $dateRange = new DateRange();
  $dateRange->min = date('Ymd', strtotime('-1 day'));
  $dateRange->max = date('Ymd', strtotime('-1 day'));
  $selector->dateRange = $dateRange;
  $page = $campaignService->get($selector);
  $results = array();
  // Display results.
  if (isset($page->entries)) {
    foreach ($page->entries as $campaign) {
      $results[] = $campaign;
    }
  }
  return $results;
}

function GetCampaignsByDate($customer_id, $date) {
  // Get the service, which loads the required classes.
  $campaignService = $this->GetService('CampaignService', ADWORDS_VERSION);

  // Create selector.
  $selector = new Selector();
  $selector->fields =
      array('Id', 'Name', 'Status', 'ServingStatus', 'StartDate', 'EndDate', 'Clicks', 
        'Impressions', 'Cost', 'Ctr', 'AverageCpc', 'AverageCpm', 'TotalBudget');

  // Create predicates.
  // $selector->predicates[] =
  //     new Predicate('Status', 'IN', array("ACTIVE")); This shit wont return any data if the campaign is currently not ACTIVE.
  $selector->predicates[] =
    new Predicate('Clicks', 'GREATER_THAN', array(0));

  // Set date range to request stats for.
  $dateRange = new DateRange();
  $consulted_date = str_replace("-", "", $date);
  $dateRange->min = $consulted_date;
  $dateRange->max = $consulted_date;
  $selector->dateRange = $dateRange;
  $page = $campaignService->get($selector);
  $results = array();
  if (isset($page->entries)) {
    foreach ($page->entries as $campaign) {
      if(!$this->campaign_exists($campaign->id, $date)){
        $info['customer_id']=$customer_id;
        $info['id']=$campaign->id;
        $info['name']=$campaign->name;
        $info['end_date']=date('Y-m-d', strtotime($campaign->endDate));
        $info['clicks']=$campaign->campaignStats->clicks;
        $info['impressions']=$campaign->campaignStats->impressions;
        $info['cost']=$campaign->campaignStats->cost->microAmount/1000000;
        $info['avg_cpc']=$campaign->campaignStats->averageCpc->microAmount/1000000;
        $info['ctr']=$campaign->campaignStats->ctr;
        $info['created']=date('Y-m-d H:i:s', strtotime($date));
        $results[]=$info;
      }
    }
  }
  return $results;
}

public function campaign_exists($campaign_id, $date){
  $CI =& get_instance();
  $CI->db->where('id', $campaign_id);
  $CI->db->like('created', $date, "right");
  return $CI->db->get('ad_campaigns')->result();
}


function GetAdGroups($campaignId) {
  // Get the service, which loads the required classes.
  $adGroupService = $this->GetService('AdGroupService', ADWORDS_VERSION);

  // Create selector.
  $selector = new Selector();
  $selector->fields = array('Id', 'Name', 'AverageCpm', 'CampaignId');
  $selector->ordering[] = new OrderBy('Name', 'ASCENDING');

  // Create predicates.
  $selector->predicates[] =
      new Predicate('CampaignId', 'IN', array($campaignId));

  // Create paging controls.
  $selector->paging = new Paging(0, AdWordsConstants::RECOMMENDED_PAGE_SIZE);

  $adGroups=array();
  do {
    // Make the get request.
    $page = $adGroupService->get($selector);

    // Display results.
    if (isset($page->entries)) {
      foreach ($page->entries as $adGroup) {
        $adGroups[]=$adGroup;
      }
    }

    // Advance the paging index.
    $selector->paging->startIndex += AdWordsConstants::RECOMMENDED_PAGE_SIZE;
  } while ($page->totalNumEntries > $selector->paging->startIndex);
  return $adGroups;
}

function GetAdGroupsStatsByCamps($camp_ids, $from, $to){
  // Get the service, which loads the required classes.
  $adGroupService = $this->GetService('AdGroupService', ADWORDS_VERSION);

  // Create selector.
  $selector = new Selector();
  $selector->fields = array('Id', 'Name', 'AverageCpm', 'CampaignId','Clicks','Impressions',
    'CampaignName','Status');
  //$selector->ordering[] = new OrderBy('Clicks', 'DESCENDING');

  // Create predicates.
  $from=date('Ymd', strtotime($from));
  $to=date('Ymd', strtotime($to));
  $selector->predicates[] =
    new Predicate('CampaignId', 'IN', $camp_ids);
  $selector->predicates[] =
    new Predicate('Clicks', 'GREATER_THAN', array(0));

  // Create paging controls.
  $selector->paging = new Paging(0, AdWordsConstants::RECOMMENDED_PAGE_SIZE);
  $dateRange = new DateRange();
  $dateRange->min = $from;
  $dateRange->max = $to;
  $selector->dateRange = $dateRange;

  $adGroups=array();
  do {
    // Make the get request.
    $page = $adGroupService->get($selector);

    // Display results.
    if (isset($page->entries)) {
      foreach ($page->entries as $adGroup) {
        /*
        $data['id']=$adGroup->id;
        $data['session']=$session_id;
        $data['campaignId']=$adGroup->campaignId;
        $data['name']=$adGroup->name;
        $data['clicks']=$adGroup->stats->clicks;
        $data['impressions']=$adGroup->stats->impressions;
        $adGroups[]=$data;
        */
        $adGroups['names'][]=$adGroup->name;
        $adGroups['clicks'][]=$adGroup->stats->clicks;
        $adGroups['impressions'][]=$adGroup->stats->impressions;
      }
    }

    // Advance the paging index.
    $selector->paging->startIndex += AdWordsConstants::RECOMMENDED_PAGE_SIZE;
  } while ($page->totalNumEntries > $selector->paging->startIndex);
  return $adGroups;
}

function GetAdGroupsStats($campaignId, $min, $max) {
  // Get the service, which loads the required classes.
  $adGroupService = $this->GetService('AdGroupService', ADWORDS_VERSION);

  // Create selector.
  $selector = new Selector();
  $selector->fields = array('Id', 'Name', 'AverageCpm', 'CampaignId','Clicks','Impressions',
    'CampaignName','Status');
  $selector->ordering[] = new OrderBy('Name', 'ASCENDING');

  // Create predicates.
  $selector->predicates[] =
      new Predicate('CampaignId', 'IN', array($campaignId));
  $selector->predicates[] =
new Predicate('Impressions', 'GREATER_THAN', array(0));

  // Create paging controls.
  $selector->paging = new Paging(0, AdWordsConstants::RECOMMENDED_PAGE_SIZE);
  $dateRange = new DateRange();

  $dateRange->min = $min;
  $dateRange->max = $max;
  $selector->dateRange = $dateRange;

  $adGroups=array();
  do {
    // Make the get request.
    $page = $adGroupService->get($selector);

    // Display results.
    if (isset($page->entries)) {
      foreach ($page->entries as $adGroup) {
        $adGroups['names'][]=$adGroup->name;
        $adGroups['clicks'][]=$adGroup->stats->clicks;
        $adGroups['impressions'][]=$adGroup->stats->impressions;
      }
    }

    // Advance the paging index.
    $selector->paging->startIndex += AdWordsConstants::RECOMMENDED_PAGE_SIZE;
  } while ($page->totalNumEntries > $selector->paging->startIndex);
  return $adGroups;
}

function GetTextAds($adGroupId) {
  // Get the service, which loads the required classes.
  $adGroupAdService = $this->GetService('AdGroupAdService', ADWORDS_VERSION);

  // Create selector.
  $selector = new Selector();
  $selector->fields = array('Headline', 'Id');
  $selector->ordering[] = new OrderBy('Headline', 'ASCENDING');

  // Create predicates.
  $selector->predicates[] = new Predicate('AdGroupId', 'IN', array($adGroupId));
  $selector->predicates[] = new Predicate('AdType', 'IN', array('TEXT_AD'));
  // By default disabled ads aren't returned by the selector. To return them
  // include the DISABLED status in a predicate.
  $selector->predicates[] =
      new Predicate('Status', 'IN', array('ENABLED'));

  // Create paging controls.
  $selector->paging = new Paging(0, AdWordsConstants::RECOMMENDED_PAGE_SIZE);

  $adGroupAds=array();
  do {
    // Make the get request.
    $page = $adGroupAdService->get($selector);

    // Display results.
    if (isset($page->entries)) {
      foreach ($page->entries as $adGroupAd) {
        /*
        $adGroupAds[]=$adGroupAd;
        */
        $ad_group_ad['adGroupId']=$adGroupAd->adGroupId;
        $ad_group_ad['id']=$adGroupAd->ad->id;
        $ad_group_ad['headline']=$adGroupAd->ad->headline;
        $ad_group_ad['description1']=$adGroupAd->ad->description1;
        $ad_group_ad['description2']=$adGroupAd->ad->description2;

        if (strpos($adGroupAd->ad->url,'xg4ken') !== false) {
          $ad_group_ad['url']=$this->clean_url($adGroupAd->ad->url);
        }
        else{
          $ad_group_ad['url']=$adGroupAd->ad->url;
        }
        $adGroupAds[]=$ad_group_ad;
      }
    }

    // Advance the paging index.
    $selector->paging->startIndex += AdWordsConstants::RECOMMENDED_PAGE_SIZE;
  } while ($page->totalNumEntries > $selector->paging->startIndex);

  return $adGroupAds;
}

public function clean_url($url){
  //print_r($url);
  $var = urldecode($url);
  $arr = explode('url[]=', $var);
  $processedurl= $arr[1];
  return $processedurl;
}

function GetKeywords($adGroupId,$min,$max) {
  // Get the service, which loads the required classes.
  $adGroupCriterionService =
      $this->GetService('AdGroupCriterionService', ADWORDS_VERSION);

  // Create selector.
  $selector = new Selector();
  $selector->fields = array('KeywordText', 'Id', 'Impressions', 'AdGroupId', 'Clicks', 'Ctr', 'Cost');
  $selector->ordering[] = new OrderBy('KeywordText', 'ASCENDING');

  // Create predicates.
  $selector->predicates[] = new Predicate('AdGroupId', 'IN', array($adGroupId));
  $selector->predicates[] =
new Predicate('Clicks', 'GREATER_THAN', array(0));
  $selector->predicates[] =
      new Predicate('CriteriaType', 'IN', array('KEYWORD'));

  // Create paging controls.
  $selector->paging = new Paging(0, AdWordsConstants::RECOMMENDED_PAGE_SIZE);

  $dateRange = new DateRange();

  $dateRange->min = $min;
  $dateRange->max = $max;
  $selector->dateRange = $dateRange;

  $keywords=array();
  do {
    // Make the get request.
    $page = $adGroupCriterionService->get($selector);

    // Display results.
    if (isset($page->entries)) {
      foreach ($page->entries as $adGroupCriterion) {
        $array['id']=$adGroupCriterion->criterion->id;
        $array['adGroupid']=$adGroupId;
        $array['text']=$adGroupCriterion->criterion->text;
        $array['clicks']=$adGroupCriterion->stats->clicks;
        $array['impressions']=$adGroupCriterion->stats->impressions;
        $array['ctr']=$adGroupCriterion->stats->ctr;
        $array['cost']=$adGroupCriterion->stats->cost->microAmount/1000000;
        $keywords[]=$array;
        /*
        */
      }
    } 
    // Advance the paging index.
    $selector->paging->startIndex += AdWordsConstants::RECOMMENDED_PAGE_SIZE;
  } while ($page->totalNumEntries > $selector->paging->startIndex);
  return $keywords;
}

function GetKeywordsByadGroupsArray($adGroupIds,$session_id,$min,$max) {
  // Get the service, which loads the required classes.
  $adGroupCriterionService =
      $this->GetService('AdGroupCriterionService', ADWORDS_VERSION);

  // Create selector.
  $selector = new Selector();
  $selector->fields = array('KeywordText', 'Id', 'Impressions', 'AdGroupId', 'Clicks', 'Ctr', 'Cost');
  $selector->ordering[] = new OrderBy('KeywordText', 'ASCENDING');

  // Create predicates.
  $selector->predicates[] = new Predicate('AdGroupId', 'IN', $adGroupIds);
  $selector->predicates[] =
new Predicate('Clicks', 'GREATER_THAN', array(0));
  $selector->predicates[] =
      new Predicate('CriteriaType', 'IN', array('KEYWORD'));

  // Create paging controls.
  $selector->paging = new Paging(0, AdWordsConstants::RECOMMENDED_PAGE_SIZE);

  $dateRange = new DateRange();
  
  $dateRange->min = $min;
  $dateRange->max = $max;
  $selector->dateRange = $dateRange;

  $keywords=array();
  do {
    // Make the get request.
    $page = $adGroupCriterionService->get($selector);

    // Display results.
    if (isset($page->entries)) {
      foreach ($page->entries as $adGroupCriterion) {
        $array['id']=$adGroupCriterion->criterion->id;
        $array['adGroupid']=$adGroupCriterion->adGroupId;
        $array['text']=$adGroupCriterion->criterion->text;
        $array['clicks']=$adGroupCriterion->stats->clicks;
        $array['impressions']=$adGroupCriterion->stats->impressions;
        $array['ctr']=$adGroupCriterion->stats->ctr;
        $array['cost']=$adGroupCriterion->stats->cost->microAmount/1000000;
        $array['session']=$session_id;
        $keywords[]=$array;
        /*
        $keywords[]=$adGroupCriterion;
        */
      }
    } 
    // Advance the paging index.
    $selector->paging->startIndex += AdWordsConstants::RECOMMENDED_PAGE_SIZE;
  } while ($page->totalNumEntries > $selector->paging->startIndex);
  return $keywords;
}

function DownloadCriteriaReportExample( $filePath) {
  // Load the service, so that the required classes are available.
  $this->LoadService('ReportDefinitionService', ADWORDS_VERSION);

  // Create selector.
  $selector = new Selector();
  $selector->fields = array('AccountId', 'Impressions', 'Clicks', 'Cost', 'Date', );

  $dateRange = new DateRange();
  $dateRange->min = date('Ymd', strtotime('-1 month'));
  $dateRange->max = date('Ymd', strtotime('-1 day'));
  $selector->dateRange = $dateRange;
  // Create report definition.
  $reportDefinition = new ReportDefinition();
  $reportDefinition->selector = $selector;
  $reportDefinition->reportName = 'Criteria performance report #' . uniqid();
  $reportDefinition->dateRangeType = 'CUSTOM_DATE';
  $reportDefinition->reportType = 'ACCOUNT_PERFORMANCE_REPORT';
  $reportDefinition->downloadFormat = 'CSV';

  // Exclude criteria that haven't recieved any impressions over the date range.
  $reportDefinition->includeZeroImpressions = FALSE;

  // Set additional options.
  $options = array('version' => ADWORDS_VERSION, 'returnMoneyInMicros' => TRUE);

  // Download report.
  ReportUtils::DownloadReport($reportDefinition, $filePath, $this, $options);

  printf("Report with name '%s' was downloaded to '%s'.\n",
      $reportDefinition->reportName, $filePath);
}
 
public function GetAccounts() {
  // Get the service, which loads the required classes.
  $managedCustomerService =
      $this->GetService('ManagedCustomerService', ADWORDS_VERSION);

  // Create selector.
  $selector = new Selector();
  // Specify the fields to retrieve.
  $selector->fields = array('Login', 'CustomerId',  'Name');
  // Make the get request.
  $graph = $managedCustomerService->get($selector);

  $customerList = array();
  foreach ($graph->entries as $account) {
    $customerList[] = array(
      'CUSTOMER_ID' => $account->customerId,
      'NAME' => $account->name,
      'LOGIN' => $account->login
      );
  }
  return $customerList;
}

/**
 * Displays an account tree, starting at the account and link provided, and
 * recursing to all child accounts.
 * @param Account $account the account to display
 * @param Link $link the link used to reach this account
 * @param array $accounts a map from customerId to account
 * @param array $links a map from customerId to child links
 * @param int $depth the depth of the current account in the tree
 */
function DisplayAccountTree($account, $link, $accounts, $links, $depth) {
  print str_repeat('-', $depth * 2);
  printf("%s, %s\n", $account->customerId,
      !empty($link->descriptiveName) ? $link->descriptiveName :$account->login);
  if (array_key_exists($account->customerId, $links)) {
    foreach ($links[$account->customerId] as $childLink) {
      $childAccount = $accounts[$childLink->clientCustomerId];
      $this->DisplayAccountTree($childAccount, $childLink, $accounts, $links,
          $depth +1);
    }
  }
}
 
}