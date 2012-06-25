<?php
    /**
     * @class  search
     * @author NHN (developers@xpressengine.com)
     * @brief view class of the search module
     **/

    class zend_search extends ModuleObject {

        /**
         * @brief Implement if additional tasks are necessary when installing
         **/
        function moduleInstall() {
            // Registered in action forward
            $oModuleController = getController('module');
            $oModuleController->insertActionForward('zend_search', 'view', 'IS');

            //Zend_Search_Lucene search index building
            $oModuleController->insertTrigger('document.insertDocument', 'zend_search', 'controller', 'triggerInsertDocument', 'after');
            $oModuleController->insertTrigger('document.updateDocument', 'zend_search', 'controller', 'triggerUpdateDocument', 'after');
            $oModuleController->insertTrigger('document.deleteDocument', 'zend_search', 'controller', 'triggerDeleteDocument', 'after');
            $oModuleController->insertTrigger('comment.insertComment', 'zend_search', 'controller', 'triggerInsertComment', 'after');
            $oModuleController->insertTrigger('comment.updateComment', 'zend_search', 'controller', 'triggerUpdateComment', 'after');
            $oModuleController->insertTrigger('comment.deleteComment', 'zend_search', 'controller', 'triggerDeleteComment', 'after');
            $oModuleController->insertTrigger('trackback.insertTrackback', 'zend_search', 'controller', 'triggerInsertTrackback', 'after');
            $oModuleController->insertTrigger('trackback.deleteTrackback', 'zend_search', 'controller', 'triggerDeleteTrackback', 'after');

            return new Object();
        }

        /**
         * @brief a method to check if successfully installed
         **/
        function checkUpdate() {
            $oDB = DB::getInstance();
            $oModuleModel = getModel('module');
            if(!$oModuleModel->getTrigger('document.insertDocument', 'zend_search', 'controller', 'triggerInsertDocument', 'after')) return true;
            if(!$oModuleModel->getTrigger('document.updateDocument', 'zend_search', 'controller', 'triggerUpdateDocument', 'after')) return true;
            if(!$oModuleModel->getTrigger('document.deleteDocument', 'zend_search', 'controller', 'triggerDeleteDocument', 'after')) return true;
            if(!$oModuleModel->getTrigger('comment.insertComment', 'zend_search', 'controller', 'triggerInsertComment', 'after')) return true;
            if(!$oModuleModel->getTrigger('comment.updateComment', 'zend_search', 'controller', 'triggerUpdateComment', 'after')) return true;
            if(!$oModuleModel->getTrigger('comment.deleteComment', 'zend_search', 'controller', 'triggerDeleteComment', 'after')) return true;
            if(!$oModuleModel->getTrigger('trackback.insertTrackback', 'zend_search', 'controller', 'triggerInsertTrackback', 'after')) return true;
            if(!$oModuleModel->getTrigger('trackback.deleteTrackback', 'zend_search', 'controller', 'triggerDeleteTrackback', 'after')) return true;
            return false;
        }

        /**
         * @brief Execute update
         **/
        function moduleUpdate() {
            $oDB = DB::getInstance();
            $oModuleModel = getModel('module');
            $oModuleController = getController('module');

            if (!$oModuleModel->getTrigger('document.insertDocument', 'zend_search', 'controller', 'triggerInsertDocument', 'after')) $oModuleController->insertTrigger('document.insertDocument', 'zend_search', 'controller', 'triggerInsertDocument', 'after');
            if (!$oModuleModel->getTrigger('document.updateDocument', 'zend_search', 'controller', 'triggerUpdateDocument', 'after')) $oModuleController->insertTrigger('document.updateDocument', 'zend_search', 'controller', 'triggerUpdateDocument', 'after');
            if (!$oModuleModel->getTrigger('document.deleteDocument', 'zend_search', 'controller', 'triggerDeleteDocument', 'after')) $oModuleController->insertTrigger('document.deleteDocument', 'zend_search', 'controller', 'triggerDeleteDocument', 'after');
            if (!$oModuleModel->getTrigger('comment.insertComment', 'zend_search', 'controller', 'triggerInsertComment', 'after')) $oModuleController->insertTrigger('comment.insertComment', 'zend_search', 'controller', 'triggerInsertComment', 'after');
            if (!$oModuleModel->getTrigger('comment.updateComment', 'zend_search', 'controller', 'triggerUpdateComment', 'after')) $oModuleController->insertTrigger('comment.updateComment', 'zend_search', 'controller', 'triggerUpdateComment', 'after');
            if (!$oModuleModel->getTrigger('comment.deleteComment', 'zend_search', 'controller', 'triggerDeleteComment', 'after')) $oModuleController->insertTrigger('comment.deleteComment', 'zend_search', 'controller', 'triggerDeleteComment', 'after');
            if (!$oModuleModel->getTrigger('trackback.insertTrackback', 'zend_search', 'controller', 'triggerInsertTrackback', 'after')) $oModuleController->insertTrigger('trackback.insertTrackback', 'zend_search', 'controller', 'triggerInsertTrackback', 'after');
            if (!$oModuleModel->getTrigger('trackback.deleteTrackback', 'zend_search', 'controller', 'triggerDeleteTrackback', 'after')) $oModuleController->insertTrigger('trackback.deleteTrackback', 'zend_search', 'controller', 'triggerDeleteTrackback', 'after');

            return new Object(0, 'success_updated');
        }

        /**
         * @brief Re-generate the cache file
         **/
        function recompileCache() {
        }
    }
?>
